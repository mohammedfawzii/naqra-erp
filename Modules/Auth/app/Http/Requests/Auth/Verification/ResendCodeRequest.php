<?php

namespace Modules\Auth\Http\Requests\Auth\Verification;

use App\Http\Requests\BaseValidation;

class ResendCodeRequest extends BaseValidation
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:user_two_factors,user_id',
            'method'  => 'required|string|in:email,sms,app',
         ];
    }

}