<?php

namespace App\Http\Controllers;

use App\Enums\DProjectDocumentEnum\DProjectFormStatus;
use App\Enums\DProjectEnum\DVisiteState;
use App\Enums\PTypeVisitEnum\PTypeVisitEnum;
use App\Models\DProject;
use App\Models\DProjectDocument;
use App\Models\PDocument;
use App\Services\DProjectServices\DProjectService;
use App\Services\PDocumentQuestionServices\PDocumentQuestionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PDocumentQuestionController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'Document non trouvé.';

    public function __construct(private PDocumentQuestionService $pDocumentQuestionService, private DProjectDocument $dProjectDocument,
        private DProjectService $dProjectService,
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DProject $dProject, PDocument $pDocument)
    {
        $pDocumentQuestions = $this->pDocumentQuestionService->getAll($dProject, $pDocument);

        return response()->json(
            $pDocumentQuestions
        );
    }

    public function saveQuestionResponses(Request $request, DProject $dProject, PDocument $pDocument)
    {
        // dd($request->responses[1]['response']['content'][0]['answer']);
        $request->validate([
            'responses' => 'required|array',
            'responses.1.response.content.0.answer' => 'nullable|integer|before:'.now()->format('Y'),
            'responses.1.response.content.1.answer' => 'nullable|numeric',
            'responses.1.response.content.2.answer' => 'nullable|numeric',
            'responses.1.response.content.3.answer' => 'nullable|integer|max:100',
        ], [
            'responses.1.response.content.0.answer.integer' => 'Année de construction doit être un entier',
            'responses.1.response.content.1.answer.numeric' => 'Surface habitable doit contenir un nombre',
            'responses.1.response.content.0.answer.before' => 'Année de construction doit être une date antérieure au '.now()->format('Y'),
            'responses.1.response.content.2.answer.numeric' => 'Hauteur sous plafond (m)  doit contenir un nombre',
            'responses.1.response.content.3.answer.integer' => 'Nombre de niveau doit être un entier',
            'responses.1.response.content.3.answer.max' => 'La valeur de Nombre de niveau ne peut pas être supérieure à 100',
        ]);
        $this->pDocumentQuestionService->saveResponses($request->responses, $dProject->id, $pDocument);
        $projectDocument = $this->dProjectDocument::where(
            'd_project_id',
            $dProject->id
        )->where('type_doc', $pDocument->type)->first();
        $this->pDocumentQuestionService->generateQuestionResponses($dProject, $projectDocument, $pDocument);
        $this->dProjectService->setDocumentGenerated($projectDocument, $pDocument);
        $visit = $dProject->visits->firstWhere('type', PTypeVisitEnum::REL_AUDIT->value);
        if ($visit) {
            $visit->update(['state' => DVisiteState::FINISHED->value]);
        }
        setLog(__(
            'logs.question.save', [
                'admin' => auth()->user()->username,
            ]
        ).$dProject->reference);

        return response()->json(['message' => __('responses.question.save')], 200);
    }

    public function saveImagesResponses(Request $request, DProject $dProject, PDocument $pDocument)
    {
        $request->validate([
            'parois_images' => 'nullable|array',
            'chauffage_images' => 'nullable|array',
            'autres' => 'nullable|array',
            'parois_images.*' => 'image|mimes:jpeg,png,jpg',
            'chauffage_images.*' => 'image|mimes:jpeg,png,jpg',
            'autres.*' => 'image|mimes:jpeg,png,jpg',
            'signature' => 'nullable',
        ]);
        $images['parois'] = $this->pDocumentQuestionService->saveimages($request->file('parois_images'), $dProject->id);
        $images['chauffage'] = $this->pDocumentQuestionService->saveimages(
            $request->file('chauffage_images'),
            $dProject->id
        );
        $images['autres'] = $this->pDocumentQuestionService->saveimages($request->file('autres'), $dProject->id);
        $images['signature'] = $request->signature;
        $this->pDocumentQuestionService->saveImagesResponses($images, $dProject->id, $pDocument);

        return response()->json(['message' => __('responses.question.save')], 200);
    }

    public function generateResponses(DProject $dProject, PDocument $pDocument)
    {
        $projectDocument = $this->dProjectDocument::where(
            'd_project_id',
            $dProject->id
        )->where('type_doc', $pDocument->type)->first();
        $this->pDocumentQuestionService->generateQuestionResponses($dProject, $projectDocument, $pDocument);
        setLog(__(
            'logs.question.generate'
        ).$dProject->reference);

        return response()->json(['message' => __('responses.question.generate')], 200);
    }

    public function finishNavette(DProject $dProject, PDocument $pDocument): JsonResponse
    {
        $projectDocument = $this->dProjectDocument::where('d_project_id', $dProject->id)
            ->where('type_doc', $pDocument->type)->first();
        $projectDocument->status = DProjectFormStatus::FINISHED->value;
        $projectDocument->save();
        setLog(__(
            __('logs.form.finish')
        ).$dProject->reference);

        notifyUsers(
            __('logs.form.finish'),
            __('logs.form.finish'),
            [$dProject->company],
            null,
            true
        );

        return response()->json(['message' => __('responses.question.finish')], 200);
    }
}
