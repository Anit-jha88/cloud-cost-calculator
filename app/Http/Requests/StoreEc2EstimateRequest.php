<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEc2EstimateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'instance_type' => 'required|string',

            'region' => 'required|string',

            'operating_system' => 'required|string',

            'instances' => 'required|integer|min:1',

            'hours' => 'required|integer|min:1|max:744',

            'storage' => 'required|integer|min:1'

        ];
    }
}