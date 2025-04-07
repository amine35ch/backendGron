<?php

namespace App\Http\Requests\BasketRequests;

use Illuminate\Foundation\Http\FormRequest;

class BasketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'model' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    $modelClass = 'App\\Models\\'.ucfirst($value);
                    if (! class_exists($modelClass)) {
                        $fail('Model non trouvé.');
                    }
                },
            ],
        ];
    }
}
