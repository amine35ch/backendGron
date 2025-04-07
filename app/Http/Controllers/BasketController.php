<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketRequests\BasketRequest;
use App\Services\BasketServices\BasketService;

class BasketController extends Controller
{
    public function __construct(private BasketService $basketService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BasketRequest $request)
    {
        $basket = $this->basketService->getAll($request['model']);
        return response()->json(
            $basket
        );
    }

    public function backRecord(BasketRequest $request, $id)
    {
        $this->basketService->backRecord($request['model'], $id);
        return response()->json(
            ['message' => __('actions.success')],
        );
    }

    public function forceDelete(BasketRequest $request,$id){
        $this->basketService->forceDelete($request['model'],$id);
        return response()->json(
            ['message' => __('actions.success')],
        );
    }
}
