<?php

namespace Modules\Auth\Http\Requests\Auth\Login;

use App\Http\Requests\BaseValidation;

class LoginByGoogleRequest extends BaseValidation
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'token'=>'required|string'
        ];
    }

   
}
