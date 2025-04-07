<?php

namespace App\Services\DProjectServices;

use App\Enums\DProjectDocumentEnum\DProjectFormStatus;
use App\Models\DProjectDocumentVersion;
use App\Models\DResponseForm;
use App\Models\PForm;
use App\Models\PFormLine;
use App\Services\DProjectDocumentVersionServices\DProjectDocumentVersionService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class GenerateFormService
{
    public function generatePdf($project, $projectDocument, $pDocument)
    {

        $form = $this->getForm($project, $pDocument);
        $this->generateBlocsWithLines($form, $countStatus, $test);
        // get images from form and copy images to public to get pdf access
        $images = [];
        $staticMaps = [];
        foreach ($form->blocs as $bloc) {
            $lines = $bloc->lines;
            foreach ($lines as $line) {
                if ($line->type === 2) {
                    $responseImage = DResponseForm::where('d_project_id', $project->id)
                        ->where('reference_line', $line->id)
                        ->first();
                    if ($responseImage) {
                        foreach ($responseImage['path_photos'] as $photoChemin) {
                            if (array_key_exists('path', $photoChemin)) {
                                $fileName = $photoChemin['name'];
                                $filePath = str_replace('/storage/', '', $photoChemin['path']);
                                if (Storage::disk('local')->exists($filePath)) {
                                    // $destination = 'public/images/' . $fileName;
                                    // $fileContents = Storage::disk('local')->get($filePath);
                                    // Storage::put($destination, $fileContents);
                                    // $latitude = $responseImage['emplacement']['latitude'] ?? '';
                                    // $longitude = $responseImage['emplacement']['longitude'] ?? '';
                                    // $url = "https://api.mapbox.com/styles/v1/mapbox/streets-v12/static/geojson(%7B%22type%22%3A%22Point%22%2C%22coordinates%22%3A%5B{$longitude}%2C{$latitude}%5D%7D)/{$longitude},{$latitude},12/200x150?access_token=pk.eyJ1Ijoib25seWtoIiwiYSI6ImNsbHFrc2R5NDBmNzIzbGwwMTFlMjUydmIifQ.L45NbSXjYDYTUKWT9FMERQ";
                                    // $image = file_get_contents($url);
                                    // $storagePath = 'static_maps/' . uniqid() . '.png';
                                    // Storage::put($storagePath, $image);
                                    // $imageUrl = asset(Storage::url($storagePath));
                                    // $staticMaps[] = $url;
                                    $images[] = [$filePath, $responseImage['emplacement'], $responseImage['image_date']];
                                }
                            }
                        }
                    }
                }
            }
        }
        $generalDetails = [
            'reference' => $project->reference,
            'dateVisite' => Carbon::parse($project->start_date)->format('d-m-Y H:i'),
        ];
        $rapportStatusFinal = '2';
        // switch ($status) {
        //     case 'satisfaisant':
        //         $rapportStatusFinal = 2;
        //         break;
        //     case 'non satisfaisant':
        //         $rapportStatusFinal = 1;
        //         break;
        //     case 'non vérifiable':
        //         $rapportStatusFinal = 0;
        //         break;
        // }
        $statusByInspection = $rapportStatusFinal;
        $pdfDetails = [
            'form' => $form,
            'generalDetails' => $generalDetails,
            // 'rapportStatus' => $status,
            'images' => $images,
            'staticMaps' => $staticMaps,
            'inspectionId' => $project->id,
            'historics' => [
                [
                    'titre' => 'Date de creation',
                    'date' => Carbon::parse($project->start_date)->format('d-m-Y H:i'),
                ],
                [
                    'titre' => 'Date de clôture',
                    'date' => Carbon::parse($project->finalization_date)->format('d-m-Y H:i'),
                ],
                [
                    'titre' => 'Date de validation',
                    'date' => Carbon::parse($project->validation_date)->format('d-m-Y H:i'),
                ],
            ],
        ];
        // $encoding = $this->detect_encoding_recursive($pdfDetails);

        // dd($pdfDetails['form']->blocs[0]->lines[7]);
        // return view('forms.staticform',[
        //     'pdfDeatils' => $pdfDetails
        // ]);
        $pdf = pdf::loadView(
            $pDocument->blade_path,
            [
                'pdfDeatils' => $pdfDetails,
                'project' => $project
            ],
        )->setOption([
            'fontDir' => storage_path('/fonts'),
            'fontCache' => storage_path('/fonts'),
        ]);
        $count = $projectDocument->version_count + 1;
        $generatedPath = 'Projects/Project-' . $project->id . '/'
            . $projectDocument->name . '-' . $count . '.pdf';
        $pdf->save($generatedPath, 'local');
        $projectDocument->path = $generatedPath;
        $projectDocument->status = DProjectFormStatus::GENERATED->value;
        $projectDocument->version_count = $count;
        $projectDocument->save();
        (new DProjectDocumentVersionService(
            new DProjectDocumentVersion()
        ))->create([
            'name' => $projectDocument->name,
            'path' => $generatedPath,
            'document_id' => $projectDocument->id,
        ]);

        // remove public images after used in pdf
        // if (isset($images)) {
        //     foreach ($images as $imagePath) {
        //         try {
        //             Storage::disk('local')->delete($imagePath);
        //         } catch (\Throwable $th) {
        //         }
        //     }
        // }
        return response()->json([
            'message' => __('responses.form.generate'),
        ], 200);
    }

    public function generateBlocsWithLines($form, &$countStatus, &$test)
    {
        foreach ($form->blocs as $bloc) {
            $lines = $bloc->lines;
            $index = -1;
            foreach ($lines as $line) {
                if ($line['type'] != 5 && $line['type'] != 10) {
                    $index++;
                }

                if ($line->fichier_test && count($line->formResponse)) {
                    foreach ($line->content as $data) {
                        foreach ($data['fields'] as $field) {
                            if (isset($field['ajout'])) {
                                foreach ($field['ajout'] as $ajout) {
                                    if (isset($ajout['fields'])) {
                                        $question = $ajout['question'];
                                        foreach ($ajout['fields'] as $fil) {
                                            if ($fil['status'] && $fil['value'] != null && $fil['value'] != '') {
                                                if ($fil['status'] == 'non satisfaisant' or $fil['status'] == 'non vérifiable') {
                                                    $nonSatisfaisant[] = [
                                                        'bloc' => $bloc->titre,
                                                        'titre' => $data['question'],
                                                        'sous_titre' => '',
                                                        'question' => $index + 1,
                                                        // 'question' => $question . ' | ' . $fil["title"],
                                                        'type' => $field['status'],
                                                    ];
                                                }
                                                if ($countStatus == 0 && in_array(
                                                    $fil['status'],
                                                    ['non satisfaisant', 'non vérifiable']
                                                )) {
                                                    $status = $fil['status'];
                                                    $countStatus++;
                                                }
                                            }
                                        }
                                    }
                                }
                            } else {
                                if (
                                    isset($field['condition']) &&
                                    ($field['value'] != null && $field['value'] != '')
                                ) {
                                    $value = $field['value'];
                                    $condition = $field['condition'];
                                    eval("\$test = $value $condition;");
                                    if ($test) {
                                        if ($line['bloc_titre']) {
                                            if (str_contains($line['bloc_titre'], ',')) {
                                                $titles = explode(',', $line['bloc_titre']);
                                            } else {
                                                $titles = $line['bloc_titre'];
                                            }
                                        }
                                        $status = $field['status'];
                                        $nonSatisfaisant[] = [
                                            'bloc' => $bloc->titre,
                                            'titre' => $titles ? (is_array($titles) ? PFormLine::where('reference', $titles[0])->pluck('titre')->first() : PFormLine::where('reference', $titles)->pluck('titre')->first()) : '',
                                            'sous_titre' => $titles ? (is_array($titles) ? PFormLine::where('reference', $titles[1])->pluck('titre')->first() : '') : '',
                                            'question' => $index + 1,
                                            // 'question' => $data['question'] . '|' . $field["title"],
                                            'type' => $field['status'],
                                        ];
                                        $titles = null;
                                        break;
                                    }
                                } else {
                                    if ($field['status'] && $field['value']) {
                                        if ($field['status'] == 'non satisfaisant' or $field['status'] == 'non vérifiable') {
                                            if ($line['bloc_titre']) {
                                                if (str_contains($line['bloc_titre'], ',')) {
                                                    $titles = explode(',', $line['bloc_titre']);
                                                } else {
                                                    $titles = $line['bloc_titre'];
                                                }
                                            }
                                            $nonSatisfaisant[] = [
                                                'bloc' => $bloc->titre,
                                                'titre' => $titles ? (is_array($titles) ? PFormLine::where('reference', $titles[0])->pluck('titre')->first() : PFormLine::where('reference', $titles)->pluck('titre')->first()) : '',
                                                'sous_titre' => $titles ? (is_array($titles) ? PFormLine::where('reference', $titles[1])->pluck('titre')->first() : '') : '',
                                                'question' => $index + 1,
                                                // 'question' => $data['question'] . '|' . $field["title"],
                                                'type' => $field['status'],
                                            ];
                                            $titles = null;
                                        }
                                        if ($countStatus == 0 && in_array(
                                            $field['status'],
                                            ['non satisfaisant', 'non vérifiable']
                                        )) {
                                            $status = $field['status'];
                                            $countStatus++;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                if ($line->remarque && count($line->formResponse)) {
                    foreach ($line->content['data']['fields'] as $field) {
                        if ($field['remarque'] && $field['value']) {
                            $constatCommenatires[] = [
                                'question' => $line->content['data']['question'],
                                'constat' => $field['remarque'],
                            ];
                        }
                    }
                }
            }
        }
    }

    public function getForm($project, $pDocument)
    {
        $form = PForm::with([
            'blocs' => function ($query) {
                $query->orderBy('order');
            },
            'blocs.lines' => function ($query) {
                $query->orderBy('order');
            },
            'blocs.lines.formResponse' => function ($query) use ($project) {
                $query->where('d_project_id', $project->id);
            },
        ])->where('type_doc', $pDocument->type)->first();
        $form->blocs->each(function ($bloc) {
            $bloc->lines->each(function ($line) {
                $response = $line->formResponse->first();
                $content = $line->content;
                if ($response) {
                    $content = $response->response;
                    $format = $content['data']['fields'][0]['format'] ?? '';
                    if ($format === 'radiobox') {
                        foreach ($content['data']['fields'] as $key => $field) {
                            $content['data']['fields'][$key]['value'] = intval($field['value']);
                            $content['data']['fields'][$key]['id'] = intval($field['id']);
                            $content['data']['fields'][$key]['blocage'] = intval($field['blocage']);
                        }
                    } else {
                        foreach ($content['data']['fields'] ?? [] as $key => $field) {
                            $content['data']['fields'][$key]['id'] = intval($field['id']);
                            $content['data']['fields'][$key]['blocage'] = intval($field['blocage']);
                        }
                    }
                } else {
                    if (array_key_exists('fields', $content['data'] ?? [])) {
                        if (! empty($content['data']['fields'] ?? [])) {
                            $content = $response->response ?? [];
                            $format = $content['data']['fields'][0]['format'] ?? '';

                            if ($format === 'radiobox') {
                                foreach ($content['data']['fields'] ?? [] as $key => $field) {
                                    $content['data']['fields'][$key]['value'] = intval($field['value']);
                                    $content['data']['fields'][$key]['id'] = intval($field['id']);
                                    $content['data']['fields'][$key]['blocage'] = intval($field['blocage']);
                                }
                            } else {
                                foreach ($content['data']['fields'] ?? [] as $key => $field) {
                                    $content['data']['fields'][$key]['id'] = intval($field['id']);
                                    $content['data']['fields'][$key]['blocage'] = intval($field['blocage']);
                                }
                            }
                        }
                    }
                }
                $line->content = $content;
            });
        });

        return $form;
    }

    //     public function detect_encoding_recursive($data, $encoding = 'UTF-8')
    //     {
    //         foreach ($data as $key => $value) {
    //             if (is_array($value)) {
    //                 $encoding = $this->detect_encoding_recursive($value, $encoding);
    //             } else {
    //                 if (mb_detect_encoding($value, $encoding, true) !== $encoding) {
    //                     $encoding = 'ISO-8859-1';
    //                     break;
    //                 }
    //             }
    //         }
    //         return $encoding;
    //     }
}
