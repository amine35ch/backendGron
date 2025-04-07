<?php

namespace App\Http\Controllers;

use App\Enums\DProjectEnum\DProjectAnahResponseEnum;
use App\Http\Requests\DProjectCommentsRequests\DProjectCommentsRequest;
use App\Models\DProject;
use App\Models\DProjectComments;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DProjectCommentsController extends Controller
{
    //projectComments
    public function index(DProject $dProject): JsonResponse
    {
        $type = $dProject->anah_first_depot_response_state === DProjectAnahResponseEnum::EDITED ? 'update' : 'cancel';
        $comments = DProjectComments::where('d_project_id', $dProject->id)->where('type', $type)->get();

        return response()->json($comments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DProjectCommentsRequest $request, DProject $dProject): JsonResponse
    {
        $user = auth()->user();
        $data = $request->validated();
        $data['d_project_id'] = $dProject->id;
        $data['d_company_id'] = $dProject->company->id;
        $data['user_id'] = $user->id;
        $data['type'] = $dProject->anah_first_depot_response_state === DProjectAnahResponseEnum::EDITED ? 'update' : 'cancel';
        $dProjectComment = DProjectComments::create($data);

        return response()->json(
            [
                'message' => 'commentaire ajouté avec succès.'
            ],
            201
        );
    }
}
