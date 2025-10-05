<?php

namespace App\Http\Requests;

 
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class BaseValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
   
        public function authorize(): bool
    {
        return true;
    }

     public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'error'   => $validator->errors()
        ], 422));
    }
}
