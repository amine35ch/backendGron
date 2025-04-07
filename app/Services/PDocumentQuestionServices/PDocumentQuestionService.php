<?php

namespace App\Services\PDocumentQuestionServices;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Enums\DProjectDocumentEnum\DProjectFormStatus;
use App\Enums\DProjectEnum\DProjectState;
use App\Enums\DProjectEnum\DProjectStatus;
use App\Enums\DProjectEnum\DVisiteState;
use App\Enums\POperationEnum\POperationType;
use App\Enums\PTypeVisitEnum\PTypeVisitEnum;
use App\Models\DCompany;
use App\Models\DProjectDocument;
use App\Models\DProjectDocumentVersion;
use App\Models\DQuestionResponse;
use App\Models\PDocumentQuestion;
use App\Services\DProjectDocumentVersionServices\DProjectDocumentVersionService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class PDocumentQuestionService
{
    public function __construct(private PDocumentQuestion $pDocumentQuestion, private DQuestionResponse $dQuestionResponse)
    {
    }

    public function getAll($dProject, $pDocument)
    {
        $pDocumentQuestions = $this->pDocumentQuestion::with([
            'questionResponses' => function ($query) use ($dProject) {
                $query->where('d_project_id', $dProject->id);
            },
        ])->where('type_doc', $pDocument->type)->get();
        if (count($pDocumentQuestions) && ! $pDocumentQuestions->first()->questionResponses->count()) {
            $dataToInsert = $pDocumentQuestions->map(function ($question) use ($dProject, $pDocument) {
                $response = $this->NavettePreFiller($question->question, $question->reference, $dProject);

                return [
                    'response' => $response,
                    'reference_question' => $question->reference,
                    'd_project_id' => $dProject->id,
                    'type_doc' => $pDocument->type,
                    'update_project' => $question->update_project,
                ];
            });
            $this->dQuestionResponse::insert($dataToInsert->toArray());
        }

        return $this->dQuestionResponse::where('d_project_id', $dProject->id)->where('type_doc', $pDocument->type)->get();
    }

    public function saveResponses($responses, $idProject, $pDocument)
    {
        foreach ($responses as $response) {
            // dd($responses['0']);
            $updateCondition = [
                'd_project_id' => $idProject,
                'id' => $response['id'],
            ];

            $this->dQuestionResponse->updateOrInsert(
                $updateCondition,
                $response
            );
        }

        $projectDocument = DProjectDocument::where(
            'd_project_id',
            $idProject
        )->where('type_doc', $pDocument->type)->first();
        $projectDocument->status = DProjectFormStatus::FILLED->value;
        $projectDocument->save();

        return true;
    }

    public function saveImagesResponses($images, $idProject, $pDocument)
    {
        $response = DQuestionResponse::where('d_project_id', $idProject)
            ->where('type_doc', $pDocument->type)
            ->where('reference_question', '11')
            ->first();

        if ($response) {
            $responseData = $response->response;
            $responseData['content'][0]['answer'] = $images['parois'];
            $responseData['content'][1]['answer'] = $images['chauffage'];
            $responseData['content'][3]['answer'] = $images['signature'];
            $responseData['content'][2]['answer'] = $images['autres'];
            $response->response = $responseData;
            $response->save();
        }

        return true;
    }

    public function generateQuestionResponses($project, $projectDocument, $pDocument)
    {
        $data = $this->dQuestionResponse::where('d_project_id', $project->id)->get();
        $pdf = PDF::loadView(
            $pDocument->blade_path,
            [
                'data' => $data,
            ]
        );
        $this->updateProjectData($data, $project);
        $count = $projectDocument->version_count + 1;
        $generatedPath = $project->directory_path.'/'.$projectDocument->name.'-'.$count.'.pdf';
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
        $user = auth()->user();
        if ($user->profile != DCompanyProfile::AUD->value) {
            $this->sendNotificationUser($project);
        }
        $typeAudit = PTypeVisitEnum::VISIT_INSTALLER->value;

        if ($pDocument->reference == 'syntheseShuttleData') {
            $project->visits->map(function ($visit) use ($typeAudit) {
                if ($visit->type == $typeAudit) {
                    $visit->update(['state' => DVisiteState::FINISHED->value]);

                    return true;
                }
            });
        }

        return true;
    }

    public function sendNotificationUser($project)
    {
        $configUrl = str_replace(
            ':id',
            $project->id,
            config('custom_routes.projects.update')
        );
        $operation = $project->operations->where(
            'type',
            POperationType::AUDIT->value
        )->firstOrFail();
        $dCompany = DCompany::find($operation->d_company_id);
        $admins = $dCompany->users()->whereHas('roles', function ($query) {
            $query->where('name', 'like', '%admin%');
        })->get();
        $message = __(
            'notifications.project.navette',
            [
                'reference' => $project->reference,
            ]
        );
        try {
            sendNotificationUser(
                'Generation de la Fiche navette',
                $message,
                $configUrl,
                null,
                $admins
            );
        } catch (\Exception $e) {
        }
    }

    public function updateProjectData($data, $project)
    {
        foreach ($data as $item) {
            if ($item->update_project) {
                $currentYear = date('Y');
                $providedYear = intval($item->response['content'][0]['answer']);
                $project->more_than_fifteen = ($currentYear - $providedYear > 15) ? 1 : 0;
                $project->surface_housing_before_work = $item->response['content'][1]['answer'] ?? 0;
                $project->ceiling_height = $item->response['content'][2]['answer'] ?? 0;
                $project->number_of_floors = $item->response['content'][3]['answer'];
                $project->save();
            }
        }
        if (! $project->more_than_fifteen) {
            $project->state = DProjectState::SUSPENDED->value;
            $project->status = DProjectStatus::NOT_QUALIFIED->value;
            $project->process_ended = 1;
            $project->save();
        }
    }

    public function saveimages($files, $idProject)
    {
        $pathes = null;
        if ($files) {
            $pathes = [];
            foreach ($files as $file) {
                $fileName = $file->hashName();
                $path = Storage::disk('local')->putFileAs(
                    'Navette/images/Project-'.$idProject,
                    $file,
                    $fileName,
                    'private'
                );

                $pathes[] = [
                    'image' => $this->baseImage(base_path('storage/app/Navette/images/Project-'.$idProject."/$fileName")),
                ];
            }
        }

        return $pathes;
    }

    public function baseImage($path)
    {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);

        return 'data:image/'.$type.';base64,'.base64_encode($data);
    }

    public function NavettePreFiller($response, $reference, $dProject)
    {

        $response = json_decode($response);
        if ($reference == '1') {
            $response->content[0]->answer = $dProject->client->first_name.' '.$dProject->client->last_name;
            $response->content[1]->answer = $dProject->client->address;
            $response->content[2]->answer = strval($dProject->client->zip_code);
        }
        if ($reference == '2') {
            $response->content[0]->answer = strval($dProject->logement_date_creation);
            $response->content[1]->answer = strval($dProject->surface_housing_before_work);
            $response->content[3]->answer = strval($dProject->number_of_floors);
        }

        return json_encode($response);
    }
}
