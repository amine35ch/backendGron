<?php

namespace App\Http\Controllers;

use App\Models\DLineResponse;
use App\Models\DProject;
use App\Models\DProjectDocument;
use App\Models\PDocument;
use App\Models\PShuttleCardBloc;
use App\Services\PFormServices\PFormService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PFormController extends Controller
{
    public const NOT_FOUND_MESSAGE = 'form non trouvé.';

    public function __construct(private PFormService $pFormService)
    {
    }

    public function saveFormImagesChanges(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'files' => 'required|array',
            'files.*' => 'image|mimes:jpeg,png,jpg',
            'line_id' => 'exists:p_form_lines,id|required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // Adjust the response format as needed
        }
        if ($request->has('line_id') && $request->hasFile('files')) {
            $this->pFormService->saveImages($request);

            return response()->json(['emssage' => 'L\'action est effectué avec succès'], 200);
        }

        return response()->json('line_id or file does not exist', 400);
    }

    public function removeImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'line_id' => 'required|exists:p_form_lines,id',
            'indice' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // Adjust the response format as needed
        }

        if ($request->has('line_id')) {
            $isDeleted = $this->pFormService->deleteImage($request);

            return response()->json([
                'message' => $isDeleted ? 'L\'action est effectué avec succès' :
                    'L\'action a échoué.',
            ], $isDeleted ? 201 : 400);
        }

        return response()->json(
            [
                'message' => 'L\'action a échoué.',
            ],
            400
        );
    }

    public function getImage(string $fileName)
    {
        ob_end_clean();
        $filePath = 'form/images/' . $fileName;
        if (Storage::disk('local')->exists($filePath)) {
            $contents = Storage::disk('local')->get($filePath);
            $contentType = mime_content_type(storage_path('app/' . $filePath));
            $response = response($contents, 200, [
                'Content-Type' => $contentType,
                'Content-Disposition' => 'inline; filename="' . basename($fileName) . '"',
            ]);

            return $response;
        } else {
            return response()->json(['error' => 'Image non trouvé']);
        }
    }

    public function getShutlleCardBlocs()
    {
        return response()->json(
            PShuttleCardBloc::where('active', 1)->get()
        );
    }

    public function getShutlleCard(DProject $dProject, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bloc_number' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $pForms = $this->pFormService->getShuttleCard($dProject, $request->input('bloc_number'));

        return response()->json(
            $pForms
        );
    }

    public function saveShutlleCard(DProject $dProject, PDocument $pDocument, Request $request): JsonResponse
    {
        $form = $this->pFormService
            ->saveShuttleCard($dProject, $request->all(), $pDocument);

        return response()->json(
            [
                'message' => 'L\'action est effectué avec succès.',
            ],
            201
        );
    }

    public function saveImages(Request $request, DProject $dProject, DLineResponse $dLineResponse): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'files' => 'required|array',
            'files.*' => 'image|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $files = $this->pFormService->saveImages($request->all(), $dProject, $dLineResponse);
        if (count($files) == 1) {
            return response()->json(
                [
                    'name' => $files[0]['name'],
                ],
                201
            );
        } else {
            $images = [];
            $images = array_map(function ($item) {
                return ['name' => $item['name']];
            }, $files);
            return response()->json(
                [
                    'name' => $images,
                ],
                201
            );
        }

    }

    public function getImageShuttleCard(string $fileName)
    {
        $filePath = 'form/images/' . $fileName;
        if (Storage::disk('local')->exists($filePath)) {
            $contents = Storage::disk('local')->get($filePath);
            $contentType = mime_content_type(storage_path('app/' . $filePath));
            $response = response($contents, 200, [
                'Content-Type' => $contentType,
                'Content-Disposition' => 'inline; filename="' . basename($fileName) . '"',
            ]);

            return $response;
        } else {
            return response()->json(['error' => 'Image non trouvé']);
        }
    }

    public function removeImageShuttleCard(DProject $dProject, DLineResponse $dLineResponse, string $fileName)
    {
        $return = $this->pFormService->removeImage($dProject, $dLineResponse, $fileName);

        if ($return) {
            return response()->json(
                [
                    'message' => 'L\'action est effectué avec succès.',
                ],
                201
            );
        }

        return response()->json(
            [
                'message' => 'L\'action a échoué.',
            ],
            201
        );
    }

    // public function generate(DProject $dProject)
    // {
    //     $path = $this->pFormService->generatePdf($dProject);
    //     $storagePath = storage_path('app/'.$path);
    //     ob_end_clean();

    //     if (Storage::disk('local')->exists($path)) {
    //         $contents = Storage::disk('local')->get($path);
    //         $contentType = mime_content_type($storagePath);

    //         return response($contents)
    //             ->header('Content-Type', $contentType)
    //             ->header('Content-Disposition', 'inline; filename="'.$dProject->id.'"');
    //     }

    //     return [null, null];
    // }

    public function generate(DProject $dProject, PDocument $pDocument)
    {
        $projectDocument = DProjectDocument::where(
            'd_project_id',
            $dProject->id
        )->where('type_doc', $pDocument->type)->first();
        $this->pFormService->generatePdf($dProject, $projectDocument, $pDocument);
        setLog(__(
            'logs.question.generate'
        ) . $dProject->reference);

        return response()->json(['message' => __('responses.question.generate')], 200);
    }

    public function downloadImage($path)
    {
        $storagePath = storage_path('app/' . $path);
        ob_end_clean();

        if (Storage::disk('local')->exists($path)) {
            $contents = Storage::disk('local')->get($path);
            $contentType = mime_content_type($storagePath);

            $headers = [
                'Content-Type' => $contentType,
                'Content-Disposition' => 'inline; filename="' . basename('shuttle-image') . '"',
            ];

            return [$contents, $headers];
        }

        return [null, null];
    }
}
