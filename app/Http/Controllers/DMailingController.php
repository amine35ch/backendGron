<?php

namespace App\Http\Controllers;

use App\Http\Requests\DMailingRequests\DMailingRequest;
use App\Http\Resources\DMailingResources\DMailingCollection;
use App\Http\Resources\DMailingResources\DMailingResources;
use App\Models\DMailing;
use App\Models\PNotification;
use App\Models\DCompany;
use App\Services\DMailingServices\DMailingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DMailingController extends Controller
{
    /**
     * Display a listing of the d_mailings.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(private DMailing $Dmailing, private DMailingService $dMailingService)
    {
        $this->dMailingService = $dMailingService;

    }
    public function index(
        Request $request,
    ) {
        $mailings = $this->dMailingService->getByCompany(
            $request->all(),
        );
        return response()->json(
            new DMailingCollection($mailings)
        );
    }


    /**
     * Update the specified d_mailing in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DMailingRequest $request, $id)
    {
        try {
            $mailing = DMailing::findOrFail($id);
            $updateData = [];

            if ($request->has('status')) {
                $updateData['status'] = (string) $request->status;
            }

            if ($request->has('statusWeb')) {
            $updateData['statusWeb'] = (string) $request->statusWeb;
            }

            if (!empty($updateData)) {
            $mailing->update($updateData);
            }

            return response()->json($mailing);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Échec de la mise à jour.'], 500);
        }
    }

}
