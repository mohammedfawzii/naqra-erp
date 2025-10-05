<?php

namespace Modules\Auth\Http\Requests\Auth\Verification;

use App\Http\Requests\BaseValidation;

class VerificationRequest extends BaseValidation
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'method'  => 'required|string|in:email,sms,app',
            'code'    => 'required|string|min:6|max:6',
        ];
    }

}