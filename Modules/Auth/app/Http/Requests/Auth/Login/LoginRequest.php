<?php

namespace Modules\Auth\Http\Requests\Auth\Login;

use App\Http\Requests\BaseValidation;
 
class LoginRequest extends BaseValidation
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'login' => 'required|string',
            'password' => 'required|string|min:6',
        ];
    }

  }
