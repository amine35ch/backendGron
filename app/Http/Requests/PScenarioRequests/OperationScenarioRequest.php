<?php

namespace App\Http\Requests\PScenarioRequests;

use Illuminate\Foundation\Http\FormRequest;

class OperationScenarioRequest extends FormRequest
{
    public function rules()
    {
        return [
            'operations.*' => 'required|exists:p_operations,id',
        ];
    }
}
