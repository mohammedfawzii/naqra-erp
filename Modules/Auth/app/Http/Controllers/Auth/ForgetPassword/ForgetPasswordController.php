<?php

namespace Modules\Auth\Http\Controllers\Auth\ForgetPassword;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Auth\Http\Requests\Auth\RestPassword\SendOtpRestPassword;
use Modules\Auth\Services\AuthPasswordReset\PasswordResetService;

class ForgetPasswordController extends Controller
{
    public function __construct(protected PasswordResetService $passwordResetService)
    {
        
    }

    public function sendOtp(SendOtpRestPassword $request)
    {
      $data=$request->validated();
      return $this->passwordResetService->sendResetCode($data['method'],$data['value']);
    }
}