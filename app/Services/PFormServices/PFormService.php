<?php

namespace App\Services\PFormServices;

use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Enums\PFormLineTypeEnum\PFormLineTypeEnum;
use App\Models\DLineResponse;
use App\Models\DProject;
use App\Models\DProjectDocument;
use App\Models\DProjectDocumentVersion;
use App\Models\PForm;
use App\Models\PProjectNature;
use App\Services\DDocumentServices\DDocumentService;
use App\Services\DProjectDocumentVersionServices\DProjectDocumentVersionService;
use App\Services\DResponseForm\DResponseFormService;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PFormService
{
    public function __construct(private PForm $pForm, private DResponseFormService $dResponseFormService, private DLineResponse $dLineResponse) {}

    public function create(array $data)
    {
        return $this->pForm::create($data);
    }

    public function edit(array $data, PForm $pForm)
    {
        return $pForm->update($data);
    }

    public function delete(PForm $pForm): void
    {
        $pForm->delete();
    }

    public function getById(int $id)
    {
        return $this->pForm::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pForm, $filters);
    }

    public function getShuttleCard(DProject $dProject, $blocNumber)
    {
        $form = $this->pForm::with([
            'shuttleBlocs' => function ($query) use ($blocNumber) {
                $query->where('active', 1)->where('order', $blocNumber)->orderBy('order');
            },
            'shuttleBlocs.lines' => function ($query) {
                $query->where('active', 1)->orderBy('order');
            },
            'shuttleBlocs.lines.responses' => function ($query) use ($dProject) {
                $query->where('d_project_id', $dProject->id);
            },
        ])->where('type_doc', 3)->get();

        $dLineResponses = [];

        foreach ($form->first()->shuttleBlocs as $bloc) {
            foreach ($bloc->lines as $line) {
                if (!count($line->responses)) {
                    $dLineResponse = [
                        'd_project_id' => $dProject->id,
                        'p_shuttle_card_line_id' => $line->id,
                        'input_type' => $line->input_type,
                        'form_bloc' => $line->form_bloc,
                        'title' => $line->title,
                        'order' => $line->order,
                        'required' => $line->required,
                        'active' => $line->active,
                        'page_break_before' => $line->page_break_before,
                        'page_break_after' => $line->page_break_after,
                        'style' => $line->style,
                        'class' => $line->class,
                        'update_project' => $line->update_project,
                        'update_client' => $line->update_client,
                        'parent' => $line->parent,
                    ];
                    if (isset($line->content) && is_array($line->content)) {
                        $dLineResponse['content'] = json_encode($line->content);
                    }
                    $dLineResponses[] = $dLineResponse;
                }
            }
        }

        if (!empty($dLineResponses)) {
            $this->dLineResponse::insert($dLineResponses);
        }

        $form = $this->pForm::with([
            'shuttleBlocs' => function ($query) use ($blocNumber) {
                $query->where('active', 1)->where('order', $blocNumber)->orderBy('order');
            },
            'shuttleBlocs.lines' => function ($query) {
                $query->where('active', 1)->orderBy('order');
            },
            'shuttleBlocs.lines.responses' => function ($query) use ($dProject) {
                $query->where('d_project_id', $dProject->id);
            },
        ])->where('type_doc', 3)->get();

        foreach ($form as $f) {
            foreach ($f->shuttleBlocs as $bloc) {
                $blocResponses = [];
                foreach ($bloc->lines as $line) {
                    foreach ($line->responses as $response) {
                        $this->getData($dProject, $response);
                        $response->save();
                        $blocResponses[] = $response;
                    }
                }
                $bloc->responses = $blocResponses;
                unset($bloc->lines);
            }
        }

        return $form->first()->shuttleBlocs->first();
    }

    public function getData($project, $response)
    {
        $client = $project->client;
        if ($response->update_client || $response->update_project) {
            $content = $response->content;

            switch ($content['question']) {
                case trim('Adresse'):
                    $content['fields'][0]['value'] = $client->house_number . ' ' . $client->street ?? $project->house_number . ' ' . $project->street;
                    break;
                case trim('Voie'):
                    $content['fields'][0]['value'] = $client->street ?? $project->street;
                    break;
                case trim('Numéro de voie'):
                    $content['fields'][0]['value'] = $client->house_number ?? $project->house_number;
                    break;

                case trim('Code postal'):
                    $content['fields'][0]['value'] = $client->zip_code ?? $project->zip_code;
                    break;
                case trim('Ville'):
                    $content['fields'][0]['value'] = $client->city ?? $project->city;
                    break;
                case trim('Nom'):
                    $content['fields'][0]['value'] = $client->last_name;
                    break;
                case trim('Prénom'):
                    $content['fields'][0]['value'] = $client->first_name;
                    break;
                case trim('Téléphone'):
                    $content['fields'][0]['value'] = $client->phone_number_1;
                    break;
                case trim('Adresse mail client'):
                    $content['fields'][0]['value'] = $client->email_contact;
                    break;
                case trim('Adresse mail ANAH'):
                    $content['fields'][0]['value'] = $client->email_anah ? $client->email_anah : $client->email_contact;
                    break;
                case trim('Mot de passe ANAH'):
                    $content['fields'][0]['value'] = $client->password_anah;
                    break;
                case trim('Nombre de personnes dans le foyer'):
                    $content['fields'][0]['value'] = $project->total_number_occupants;
                    break;
                case trim('Revenu fiscal de référence du bénéficiaire'):
                    $content['fields'][0]['value'] = $project->sum_revenue_reference_1;
                    break;
                case trim('Statut'):
                    foreach ($content['fields'] as &$field) {
                        if ($field['title'] == PProjectNature::where('type', $project->projectNature)->value('entitled')) {
                            $field['value'] = 1;
                        }
                    }
                    break;
                case trim('Année de la 1 ère construction'):
                    $content['fields'][0]['value'] = $project->logement_date_creation;
                    break;
                case trim('Surface habitable (m2)'):
                    $content['fields'][0]['value'] = $project->surface_housing_before_work;
                    break;
            }

            $response->content = $content;
            $response->save();
        }
    }

    public function saveShuttleCard(DProject $dProject, array $data, $pDocument)
    {
        $projectDocument = DProjectDocument::where(
            'd_project_id',
            $dProject->id
        )->where('type_doc', $pDocument->type)->first();
        foreach ($data['responses'] as $response) {
            if (!in_array($response['input_type'], [PFormLineTypeEnum::DRAW->value, PFormLineTypeEnum::IMAGE->value])) {
                $updateCondition = [
                    'd_project_id' => $dProject->id,
                    'p_shuttle_card_line_id' => $response['p_shuttle_card_line_id'],
                ];

                if (isset($response['content']) && is_array($response['content'])) {
                    $response['content'] = json_encode($response['content']);
                }

                if (!isset($response['created_at'])) {
                    $response['created_at'] = Carbon::now()->format('Y-m-d H:i:s');
                } else {
                    $response['created_at'] = Carbon::parse($response['created_at'])->format('Y-m-d H:i:s');
                }

                $response['updated_at'] = Carbon::now()->format('Y-m-d H:i:s');

                $this->dLineResponse->updateOrInsert(
                    $updateCondition,
                    $response
                );
            }
        }
        if (isset($data['last']) && $data['last'] == 'true') {
            $this->generatePdf($dProject, $projectDocument, $pDocument);
        }

        return true;
    }

    public function saveImages($data, DProject $dProject, DLineResponse $dLineResponse)
    {
        $pathes = [];
        if ($dLineResponse['title'] == 'SIGNATURE CLIENT PHOTO') {
            $document = [
                'file' => $data['files'][0],
                'name' => 'Signature Client VT',
            ];
            (new DDocumentService())->attachDocuments($dProject->client, $document, 'd_client_id');
        }
        foreach ($data['files'] as $file) {
            $fileName = $file->hashName();
            $path = Storage::disk('local')->putFileAs(
                'form/images',
                $file,
                $fileName,
                'private'
            );
            $pathes[] = [
                'path' => $path,
                'name' => $fileName,
            ];
            if ($dLineResponse['title'] == 'SIGNATURE CLIENT') {
                $dProject->client->update(['signature' => $path]);
            }
        }
        $existingContent = is_string($dLineResponse->content) ? json_decode($dLineResponse->content, true) : $dLineResponse->content;

        if (!is_array($existingContent)) {
            $existingContent = [];
        }

        $updatedImages = array_merge($existingContent, $pathes);

        if (!in_array($dLineResponse['input_type'], [PFormLineTypeEnum::DRAW->value, PFormLineTypeEnum::IMAGE->value])) {
            throw new \Exception('Vérifier vos données !');
        }

        $dLineResponse->update([
            'content' => $updatedImages,
        ]);

        return $pathes;
    }

    public function removeImage(DProject $dProject, DLineResponse $dLineResponse, $fileName)
    {
        if ($dLineResponse) {
            $arrayOfImages = $dLineResponse->content;
            $index = null;
            foreach ($arrayOfImages as $key => $image) {
                if ($image['name'] === $fileName) {
                    $index = $key;
                    break;
                }
            }
            if ($index !== null) {
                $filePath = 'form/images/' . $arrayOfImages[$index]['name'];
                if (Storage::disk('local')->exists($filePath)) {
                    $isDeleted = Storage::disk('local')->delete($filePath);
                    if ($isDeleted) {
                        unset($arrayOfImages[$index]);
                        $arrayOfImages = array_values($arrayOfImages);
                        $dLineResponse->update(['content' => $arrayOfImages]);

                        return true;
                    }
                }
            }
        }

        return false;
    }

    // public function generatePdf($dProject)
    // {
    //     $form = $this->pForm::with([
    //         'shuttleBlocs' => function ($query) {
    //             $query->orderBy('order');
    //         },
    //         'shuttleBlocs.lines' => function ($query) {
    //             $query->where('active', 1)->orderBy('order');
    //         },
    //         'shuttleBlocs.lines.responses' => function ($query) use ($dProject) {
    //             $query->where('d_project_id', $dProject->id);
    //         },
    //     ])->where('type_doc', 3)->get();

    //     foreach ($form as $f) {
    //         foreach ($f->shuttleBlocs as $bloc) {
    //             $blocResponses = [];
    //             foreach ($bloc->lines as $line) {
    //                 foreach ($line->responses as $response) {
    //                     $blocResponses[] = $response;
    //                 }
    //             }
    //             $bloc->responses = $blocResponses;
    //             unset($bloc->lines);
    //         }
    //     }
    //     $pdf = PDF::loadView(
    //         'shuttle-card/pdf/shuttle_card',
    //         [
    //             'data' => $form,
    //         ]
    //     );
    //     $fileName = $dProject->reference.'.pdf';
    //     $pdf->save('rapports/'.$fileName, 'local');

    //     return 'rapports/'.$fileName;
    // }

    public function generatePdf($project, $projectDocument, $pDocument)
    {
        if (!$projectDocument) {
            throw new \Exception('Vous ne pouvez pas générer le document de fiche navette !');
        }

        $form = $this->pForm::with([
            'shuttleBlocs' => function ($query) {
                $query->where('active', 1)->orderBy('order');
            },
            'shuttleBlocs.lines' => function ($query) {
                $query->where('active', 1)->orderBy('order');
            },
            'shuttleBlocs.lines.responses' => function ($query) use ($project) {
                $query->where('d_project_id', $project->id);
            },
        ])->where('type_doc', 3)->get();
        foreach ($form as $f) {
            foreach ($f->shuttleBlocs as $bloc) {
                $blocResponses = [];
                foreach ($bloc->lines as $line) {
                    foreach ($line->responses as $response) {
                        $blocResponses[] = $response;
                        $this->setData($project, $response);
                    }
                }
                $bloc->responses = $blocResponses;
                unset($bloc->lines);
            }
        }
        $pdf = PDF::loadView(
            $pDocument->blade_path,
            [
                'data' => $form,
            ]
        );
        $count = $projectDocument->version_count + 1;
        $generatedPath = $project->directory_path . '/' . $projectDocument->name . '-' . $count . '.pdf';
        $pdf->save($generatedPath, 'local');
        $projectDocument->path = $generatedPath;
        $projectDocument->version_count = $count;
        $projectDocument->status = DProjectDocumentStatus::SATISFIED->value;
        $projectDocument->save();
        (new DProjectDocumentVersionService(new DProjectDocumentVersion()))->create([
            'name' => $projectDocument->name,
            'path' => $generatedPath,
            'document_id' => $projectDocument->id,
        ]);

        return true;
    }

    public function setData($project, $response)
    {
        $client = $project->client;
        if ($response->update_client || $response->update_project) {
            $content = $response->content;
            switch ($content['question']) {
                    // case trim('Adresse'):
                    //     $content['fields'][0]['value'] = $client->house_number.' '.$client->street ?? $project->house_number.' '.$project->street;
                    //     break;
                case trim('Numéro de voie '):
                    $client->house_number = $content['fields'][0]['value'];
                    $project->house_number = $content['fields'][0]['value'];
                    break;
                case trim('Voie'):
                    $client->street = $content['fields'][0]['value'];
                    $project->street = $content['fields'][0]['value'];
                    break;
                case trim('Code postal'):
                    $client->zip_code = $content['fields'][0]['value'];
                    $project->zip_code = $content['fields'][0]['value'];
                    break;
                case trim('Ville'):
                    $client->city = $content['fields'][0]['value'];
                    $project->city = $content['fields'][0]['value'];
                    break;
                case trim('Nom'):
                    $client->last_name = $content['fields'][0]['value'];
                    break;
                case trim('Prénom'):
                    $client->first_name = $content['fields'][0]['value'];
                    break;
                case trim('Téléphone'):
                    $client->phone_number_1 = $content['fields'][0]['value'];
                    break;
                case trim('Adresse mail client'):
                    $client->email_contact = $content['fields'][0]['value'];
                    break;
                case trim('Adresse mail ANAH'):
                    $client->email_anah = $content['fields'][0]['value'];
                    break;
                case trim('Mot de passe ANAH'):
                    $client->password_anah = $content['fields'][0]['value'];
                    break;
                case trim('Nombre de personne dans le foyer'):
                    $project->total_number_occupants = $content['fields'][0]['value'];
                    break;
                case trim('Revenu fiscal de référence du bénéficiaire'):
                    $project->sum_revenue_reference_1 = $content['fields'][0]['value'];
                    break;
                case trim('Statut'):
                    foreach ($content['fields'] as $field) {
                        if ($field['value']) {
                            $project->project_nature = PProjectNature::where('entitled', $field['title'])->value('type');
                        }
                    }
                    break;
                case trim('Année de la 1 ère construction'):
                    $project->logement_date_creation = $content['fields'][0]['value'];
                    break;
                case trim('Surface habitable (m2)'):
                    $project->surface_housing_before_work = $content['fields'][0]['value'];
                    break;
            }
            $client->save();
            $project->save();
        }
    }

    // public function saveHistoryDates($date, $inspection)
    // {
    //     $startDate = [
    //         'date' => Carbon::parse($date['start'])->format('d-m-Y H:i'),
    //         'titre' => 'Date debut d\'inspection'
    //     ];
    //     $endDate = [
    //         'date' => Carbon::parse($date['end'])->format('d-m-Y H:i'),
    //         'titre' => 'Date fin d\'inspection'
    //     ];
    //     $dateJson = $inspection['date_json'];
    //     $dateJson[] = $startDate;
    //     $dateJson[] = $endDate;

    //     return $dateJson;
    // }

    // public function saveImages($request, $inspection)
    // {
    //         $inspectionFormService = new DInspectionFormService();

    //         $lineData = PFormLine::where('id', $request->line_id)->first();
    //         if ($lineData) {
    //             $line = $lineData['content']['data'];
    //             $data = null;
    //             $fields = $line['fields'];
    //             $res = '';
    //             foreach ($fields as $field) {
    //                 $res = $field;
    //                 break;
    //             }
    //             $formResponse = DInspectionForm::where('d_inspection_id', $inspection->id)
    //                 ->where('reference_line', $lineData['reference'])
    //                 ->first();
    //             if ($res) {
    //                 $pathes = $formResponse->path_photos ?? [];
    //                 foreach ($request->file('files') as $file) {
    //                     $fileName = $file->hashName();
    //                     $path = Storage::disk('local')->putFileAs(
    //                         'form/images',
    //                         $file,
    //                         $fileName,
    //                         'private'
    //                     );
    //                     $url = Storage::disk('local')->url($path);
    //                     $pathes[] = [
    //                         'path' => $url,
    //                         'name' => $fileName,
    //                         // 'id' => $counterId
    //                     ];
    //                 }
    //                 $data = [
    //                     'response' => $lineData['content'],
    //                     'choice_id' => 0,
    //                     'path_photos' => $pathes,
    //                     'state' => 1,
    //                     'p_form_line_id' => $lineData['id'],
    //                     'd_inspection_id' => $inspection->id,
    //                     'reference_line' => $lineData['reference'],
    //                     'rapport_response' => [
    //                         'id' => 0,
    //                         'value' => 0,
    //                     ],
    //                     'location' => json_decode($request->location),
    //                     'image_date' => $request->image_date ?? null
    //                 ];
    //             }
    //             if (request()->segment(1) === 'api') {
    //                 $data['image_date'] = now();
    //             }
    //             if ($data) {
    //                 DB::transaction(
    //                     function () use ($formResponse, $data, $inspectionFormService) {
    //                         if ($formResponse) {
    //                             $inspectionFormService->delete($formResponse);
    //                         }

    //                         $inspectionFormService->create($data, new DInspectionForm());
    //                     }
    //                 );
    //             }
    //     }
    // }

    // public function deleteImage($request, $inspection)
    // {
    //     $isDeleted = false;

    //     $lineData = PFormLine::where('id', $request->line_id)->first();
    //     $formResponse = DInspectionForm::where('d_inspection_id', $inspection->id)
    //         ->where('reference_line', $lineData['reference'])
    //         ->get();
    //     if ($formResponse) {
    //         foreach ($formResponse as $fResponse) {
    //             $arrayOfImages = $fResponse->path_photos;
    //             foreach ($arrayOfImages as $key => $image) {
    //                 if ($request->input('indice') ==  $key) {
    //                     $filePath = 'form/images/' . $image['name'] ?? '';
    //                     if (Storage::disk('local')->exists($filePath)) {
    //                         $isDeleted = Storage::disk('local')->delete($filePath);
    //                         array_splice($arrayOfImages, $key, 1);
    //                         $fResponse->update(['path_photos' => $arrayOfImages]);
    //                         break 2;
    //                     }
    //                 }
    //             }
    //         }
    //     }
    //     return $isDeleted;
    // }
}
