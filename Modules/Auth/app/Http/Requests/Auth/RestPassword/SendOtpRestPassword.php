<?php

namespace Modules\Auth\Http\Requests\Auth\RestPassword;

use App\Http\Requests\BaseValidation;
 
class SendOtpRestPassword extends BaseValidation
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'method'  => 'required|string|in:email,phone',
            'value'   =>'required|string|min:4'


        ];
    }

   
}
