<?php

namespace Modules\Auth\Http\Requests\Auth\Login;

use App\Http\Requests\BaseValidation;

class LoginByPhoneRequest extends BaseValidation
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'phone' => [
                'required',
                'regex:/^\+[1-9]\d{7,14}$/',
                'exists:users',
            ],
        ];
    }

    /**
     * Get custom error messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'phone.required' => 'The phone number is required.',
            'phone.regex'    => 'Invalid phone number format. It must start with + followed by the country code (e.g., +201234567890).',
            'phone.unique'   => 'This phone number is already in use.',
        ];
    }
}
