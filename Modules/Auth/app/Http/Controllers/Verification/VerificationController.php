<?php

namespace Modules\Auth\Http\Controllers\Verification;

use App\Http\Controllers\Controller;
use App\Jobs\CreateTenantJob;
use App\Models\UserTwoFactor;
use App\Services\TwoFactorService\TwoFactorService;
use App\Traits\ApiResponseTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Http\Requests\Auth\Login\LoginByPhoneRequest;
use Modules\Auth\Http\Requests\Auth\Verification\VerificationRequest;
use Modules\Auth\Http\Requests\Auth\Verification\ResendCodeRequest;
use Modules\Auth\Repositories\Auth\AuthRepositoryInterface;
use Modules\Auth\Repositories\UserTwoFactor\UserTwoFactorRepositoryInterface;
use Modules\Auth\Services\Verification\VerificationService;
use Modules\Auth\Transformers\Auth\LoginResource;
use Tymon\JWTAuth\Facades\JWTAuth;

class VerificationController extends Controller
{
    use ApiResponseTrait;
    public function __construct(
        protected AuthRepositoryInterface $userRepository,
        protected TwoFactorService $twoFactorService,
        protected UserTwoFactorRepositoryInterface $userTwoFactorRepository,
        protected VerificationService $verificationService,
    ) {}
    // for register
    public function confirmVerification(VerificationRequest $request)
    {
        $data = $request->validated();
        return $this->verificationService->confirmVerification($data['user_id'], $data['method'], $data['code']);
    }

    public function verifyOtpWithToken(VerificationRequest $request)
    {
        $data = $request->validated();
        return $this->verificationService->confirmVerification($data['user_id'], $data['method'], $data['code'], 'login');
    }

    ////////////////////////////////////////////////////////////////////
    //                      processVerificationCode

    public function resendVerificationCode(ResendCodeRequest $request)
    {
        $data = $request->validated();
        return $this->verificationService->processVerificationCode($data, 'resend');
    }

    public function sendVerificationCode(ResendCodeRequest $request)
    {
        $data = $request->validated();
        return $this->verificationService->processVerificationCode($data, 'send');
    }

    public function sendOtpByPhone(LoginByPhoneRequest $request)
    {
         $data=$request->validated();
         $user=$this->userRepository->getByFiled('phone',$data);
         $data=[
            'user_id'=>$user->id,
            'method' =>'sms',
         ];

         return $this->verificationService->processVerificationCode($data, 'send');


    }
}
