<?php

namespace App\Services\DResponseForm;

use App\Enums\DProjectDocumentEnum\DProjectFormStatus;
use App\Exceptions\CustomException;
use App\Models\DResponseForm;
use App\Models\PForm;
use Illuminate\Support\Facades\DB;

class DResponseFormService
{
    public function __construct(private DResponseForm $dResponseForm)
    {
    }

    public function create(array $data)
    {
        return $this->dResponseForm::create($data);
    }

    public function delete(DResponseForm $dResponseForm): void
    {
        $dResponseForm->delete();
    }

    public function saveForm($project, $request, $pDocument, $dProjectDocument)
    {
        try {
            DB::beginTransaction();
            $form = $request->input('form');
            $responses = $project->formResponse;
            foreach ($form['blocs'] ?? [] as $bloc) {
                $lines = $bloc['lines'] ?? [];
                foreach ($lines ?? [] as $lineData) {
                    $line = $lineData['content']['data'] ?? [];
                    $data = null;
                    if (! empty($line['fields']) && $line) {
                        $data = $this->saveLine($lineData, $project);
                    }
                    if ($data) {
                        $item = null;
                        $responses = $responses->reject(function ($attribute) use ($lineData, &$item) {
                            if ($attribute->reference_line == $lineData['reference']) {
                                $item = $attribute;

                                return $attribute;
                            }
                        });
                        if ($item != null) {
                            $item?->delete();
                        }
                        $this->create(
                            $data,
                        );
                    }
                }
            }
            $projectDocument = $dProjectDocument::where(
                'd_project_id',
                $project->id
            )->where('type_doc', $pDocument->type)->first();
            $projectDocument->status = DProjectFormStatus::FILLED->value;
            $projectDocument->save();

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException();
        }
    }

    public function saveLine($line, $project)
    {

        if (isset($line['content']['data']['fields'][0]['class']) && ($line['content']['data']['fields'][0]['class'] == 'number_and_street' || $line['content']['data']['fields'][0]['class'] == 'house_number' || $line['content']['data']['fields'][0]['class'] == 'house_number' || $line['content']['data']['fields'][0]['class'] == 'zip_code'| $line['content']['data']['fields'][0]['class'] == 'city')) {
            $project->update([
                $line['content']['data']['fields'][0]['class']=>$line['content']['data']['fields'][0]['value']
            ]);
        }
        return [
            'd_project_id' => $project->id,
            'response' => $line['content'],
            'choice_id' => 0,
            'path_photos' => [],
            'state' => 1,
            'reference_line' => $line['reference'],
            'rapport_response' => [
                'id' => 0,
                'value' => '',
            ],
        ];
    }

    public function getForm($dProject, $pDocument)
    {
        $form = PForm::with([
            'blocs' => function ($query) {
                $query->orderBy('order');
            },
            'blocs.lines' => function ($query) {
                $query->where('active', 1)->orderBy('order');
            },
            'blocs.lines.formResponse' => function ($query) use ($dProject) {
                $query->where('d_project_id', $dProject->id);
            },
        ])->where('type_doc', $pDocument->type)->first();
        if (! $form) {
            throw new CustomException('Formulaire non trouvé');
        }
        $form->blocs->each(function ($bloc) use ($dProject) {
            $bloc->lines->each(function ($line) use ($dProject) {
                $response = $line->formResponse->first();
                $content = $line->content;
                $imageResponse = $line->formResponse;
                if ($response) {
                    $content = $response->response;
                    switch ($line->type) {
                        case 1:
                            foreach ($content['data']['fields'] as $key => $field) {
                                $content['data']['fields'][$key]['value'] = intval($field['value']);
                                $content['data']['fields'][$key]['id'] = intval($field['id']);
                                $content['data']['fields'][$key]['blocage'] = intval($field['blocage']);
                                $content['data']['fields'][$key]['status'] = $field['status'] ?? null;
                                $content['data']['fields'][$key]['remarque'] = $field['remarque'] ?? null;
                            }
                            break;
                        case 3:
                            foreach ($content['data']['fields'] as $key => $field) {
                                $content['data']['fields'][$key]['id'] = intval($field['id']);
                                $content['data']['fields'][$key]['blocage'] = intval($field['blocage']);
                                if ($content['data']['fields'][0]['format'] === 'number') {
                                    foreach ($content['data']['fields'] as $key => $field) {
                                        $content['data']['fields'][$key]['value'] = round(floatval(($field['value'])), 2);
                                        $content['data']['fields'][$key]['id'] = intval($field['id']);
                                        $content['data']['fields'][$key]['blocage'] = intval($field['blocage']);
                                        $content['data']['fields'][$key]['status'] = $field['status'] ?? null;
                                        $content['data']['fields'][$key]['remarque'] = $field['remarque'] ?? null;
                                    }
                                } else {
                                    foreach ($content['data']['fields'] as $key => $field) {
                                        $content['data']['fields'][$key]['value'] = $field['value'];
                                        $content['data']['fields'][$key]['id'] = intval($field['id']);
                                        $content['data']['fields'][$key]['blocage'] = intval($field['blocage']);
                                        $content['data']['fields'][$key]['status'] = $field['status'] ?? null;
                                        $content['data']['fields'][$key]['remarque'] = $field['remarque'] ?? null;
                                    }
                                }
                            }
                            break;
                        case 2:
                            $imagesResponse = [];
                            foreach ($imageResponse as $key => $field) {
                                foreach ($field['path_photos'] as $index => $image) {
                                    $imagesResponse[] = [
                                        'id' => $index + 1,
                                        'title' => '',
                                        'format' => 'image',
                                        'value' => $image['name'],
                                        'blocage' => 0,
                                    ];
                                }
                            }
                            $content['data']['fields'] = $imagesResponse;
                            break;
                        default:
                            break;
                    }
                } else {
                    if (array_key_exists('fields', $content['data'] ?? [])) {
                        if (! empty($content['data']['fields'])) {
                            switch ($line->type) {
                                case 1:
                                    foreach ($content['data']['fields'] as $key => $field) {
                                        $content['data']['fields'][$key]['value'] = intval($field['value']);
                                        $content['data']['fields'][$key]['id'] = intval($field['id']);
                                        $content['data']['fields'][$key]['blocage'] = intval($field['blocage']);
                                        $content['data']['fields'][$key]['status'] = $field['status'] ?? null;
                                        $content['data']['fields'][$key]['remarque'] = $field['remarque'] ?? null;
                                    }
                                    break;
                                case 3:
                                    foreach ($content['data']['fields'] as $key => $field) {
                                        $content['data']['fields'][$key]['id'] = intval($field['id']);
                                        $content['data']['fields'][$key]['blocage'] = intval($field['blocage']);
                                        if ($content['data']['fields'][0]['format'] === 'number') {
                                            foreach ($content['data']['fields'] as $key => $field) {
                                                $value = isset($content['data']['fields'][$key]['class']) ? $this->FormPreFiller($content['data']['fields'][$key]['class'], $dProject, true) : null;
                                                $content['data']['fields'][$key]['value'] = isset($content['data']['fields'][$key]['class']) ? $value ?? '' : $field['value'];
                                                $content['data']['fields'][$key]['id'] = intval($field['id']);
                                                $content['data']['fields'][$key]['blocage'] = intval($field['blocage']);
                                                $content['data']['fields'][$key]['status'] = $field['status'] ?? null;
                                                $content['data']['fields'][$key]['remarque'] = $field['remarque'] ?? null;
                                            }
                                        } else {
                                            foreach ($content['data']['fields'] as $key => $field) {
                                                $value = isset($content['data']['fields'][$key]['class']) ? $this->FormPreFiller($content['data']['fields'][$key]['class'], $dProject) : null;
                                                $content['data']['fields'][$key]['value'] = isset($content['data']['fields'][$key]['class']) ? $value ?? '' : $field['value'];
                                                $content['data']['fields'][$key]['id'] = intval($field['id']);
                                                $content['data']['fields'][$key]['blocage'] = intval($field['blocage']);
                                                $content['data']['fields'][$key]['status'] = $field['status'] ?? null;
                                                $content['data']['fields'][$key]['remarque'] = $field['remarque'] ?? null;
                                            }
                                        }
                                    }
                                    break;
                                case 2:
                                    $imagesResponse = [];
                                    foreach ($imageResponse as $key => $field) {
                                        foreach ($field['path_photos'] as $index => $image) {
                                            $imagesResponse[] = [
                                                'id' => $index + 1,
                                                'title' => '',
                                                'format' => 'image',
                                                'value' => $image['name'],
                                                'blocage' => 0,
                                            ];
                                        }
                                    }
                                    $content['data']['fields'] = $imagesResponse;
                                    break;
                                default:
                                    // code...
                                    break;
                            }
                        }
                    }
                }
                if (
                    array_key_exists('calcul', $content['data'] ?? []) &&
                    $content['data']['calcul'] &&
                    array_key_exists('operation', $content['data'])
                ) {
                    $content['data']['operation']['fields'] = [
                        [
                            'field_id' => ($line->id) - 1,
                            'name' => 'x',
                        ],
                        [
                            'field_id' => ($line->id) - 2,
                            'name' => 'y',
                        ],
                    ];
                }
                $line->content = $content;
            });
        });

        return $form;
    }

    public function FormPreFiller($value, $dProject, $number = false)
    {
        $signatureDate=\Carbon\Carbon::parse($dProject?->visits->where('type',0)->first()?->visit_date)->format('d/m/Y') ?? now()->format('d/m/Y');
        if (strpos($value, '.')) {
            $arrayValue = explode('.', $value);
            if ($arrayValue[1] == 'name') {
                $returnedValue = $dProject[$arrayValue[0]]->last_name.' '.$dProject[$arrayValue[0]]->first_name;
            }
            else {
                $returnedValue = $dProject[$arrayValue[0]][$arrayValue[1]];
                if ($arrayValue[1]=='siret') {
                    $returnedValue=str_replace(' ','',$returnedValue);
                 }
            }
        } elseif ($value == 'now') {
            return $signatureDate;
        } else {
         
            $returnedValue = $dProject->$value;
        }
        if ($number) {
            if ($returnedValue) {
                return round(floatval($returnedValue), 2);
            }
        }

        return $returnedValue;
    }
}
