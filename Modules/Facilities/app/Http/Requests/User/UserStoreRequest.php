<?php

namespace Modules\Facilities\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'userName' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
            'fullName' => 'required|string',
            'password' => 'required|string|max:255',
            'mobileNumber' => 'required|string|max:255',
            'securityQuestion_id' => 'required|integer|exists:security_questions,id',
            'security_answer' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'nationality_id' => 'required|exists:nationalities,id',
            'language_id' => 'required|exists:languages,id',
            'termsAccepted' => 'required|boolean',
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
