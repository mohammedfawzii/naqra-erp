<?php

namespace Modules\Facilities\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'userName' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|max:255|unique:users,email,'.$this->route('user').',id',
            'fullName' => 'sometimes|required|string',
            'password' => 'sometimes|required|string|max:255',
            'mobileNumber' => 'sometimes|required|string|max:255',
            'securityQuestion_id' => 'sometimes|required|integer|exists:security_questions,id',
            'security_answer' => 'sometimes|required|string|max:255',
            'gender' => 'sometimes|required|in:Male,Female',
            'nationality_id' => 'sometimes|required|exists:nationalities,id',
            'language_id' => 'sometimes|required|exists:languages,id',
            'termsAccepted' => 'sometimes|required|boolean',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'error' => $validator->errors()
        ], 422));
    }
}
