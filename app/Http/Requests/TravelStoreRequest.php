<?php
/**
 * Author: tmtuan
 * Created date: 6/11/2023
 * Project: travel-api
 **/

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class TravelStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'number_of_days' => 'required|integer|between:1,10'
        ];
    }

    public function failedValidation(Validator $validator)

    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));

    }

    public function messages()
    {
        return [
            'name.required' => 'name is required',
            'description.required' => 'Description is required',
            'number_of_days.required' => 'Number of days is required',
            'number_of_days.integer' => 'Number of days must be an integer',
            'number_of_days.between' => 'Number of days must be greater than 1 and lower than 10',
        ];
    }
}
