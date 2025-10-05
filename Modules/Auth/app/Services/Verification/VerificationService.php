<?php

namespace Modules\Auth\Services\Verification;

use App\Jobs\CreateTenantJob;
use App\Services\TwoFactorService\TwoFactorService;
use App\Traits\ApiResponseTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Http\Requests\Auth\Login\LoginRequest;
use Modules\Auth\Repositories\Auth\AuthRepositoryInterface;
use Modules\Auth\Repositories\UserTwoFactor\UserTwoFactorRepositoryInterface;
use PragmaRX\Google2FA\Google2FA;
use Tymon\JWTAuth\Facades\JWTAuth;

class VerificationService
{
    use ApiResponseTrait;
    public function __construct(
        protected TwoFactorService $twoFactorService,
        protected UserTwoFactorRepositoryInterface $userTwoFactorRepository,
        protected AuthRepositoryInterface $userRepository,

    ) {}
    public function processVerificationCode(array $data, string $mode = 'resend')
    {
        $result = $this->twoFactorService->resendCode(
            userId: $data['user_id'],
            method: $data['method'],
            ttlMinutes: 5,
            action: $mode
        );

        if (!($result['success'] ?? false)) {
            return $this->errorResponse($result['message'] ?? 'Failed to resend verification code', 422);
        }

        return $this->successData(['otp' => $result['otp']], $result['message']);
    }

    public function confirmVerification(int $userId, string $method, string $code, string $type = 'no-login')
    {
         $record = $this->userTwoFactorRepository->getForVerification($userId, $method);

        if (! $record) {
            return $this->errorResponse('No verification record found', 404);
        }

        $response = $this->handleCaseVerification($record, $code);
        $responseData = (array) $response->getData(true);

        if (!($responseData['success'] ?? false)) {
            
            return $response;
        }

        
        if ($type === 'login') {
            return $this->createToken($userId);
        }

        // check if verified
        if ($record->is_verified) {
            $this->markUserAsVerifiedIfAllMethodsDone($userId);
        }

        return $response;
    }

    protected function handleCaseVerification($record, string $value)
    {
        return match ($record->method) {
            'email', 'sms' => $this->verifyOtp($record, $value),
            'app' => $this->verifyAppCode($record, $value),
            default => $this->errorResponse('Invalid verification method', 422),
        };
    }

    private function verifyOtp($record, string $value)
    {
        if (!Hash::check($value, $record->otp_code)) {
            return $this->errorResponse('Invalid OTP', 422);
        }

        if ($record->otp_expires_at->isPast()) {
            return $this->errorResponse('OTP expired', 422);
        }

        $record->update(['is_verified' => true]);

        return $this->successResponse('OTP verified successfully');
    }

    private function verifyAppCode($record, string $value)
    {
        $google2fa = new Google2FA();

        if (! $google2fa->verifyKey($record->secret, $value, 2)) {
            return $this->errorResponse('Invalid authenticator code', 422);
        }

        $record->update(['is_verified' => true]);

        return $this->successResponse('Authenticator app verified successfully');
    }
    protected function markUserAsVerifiedIfAllMethodsDone($user_id)
    {
        $allVerified = $this->userTwoFactorRepository->checkAllMethodsVerified($user_id);
        if ($allVerified) {
            $user = $this->userRepository->verifyAccount($user_id);
            CreateTenantJob::dispatch($user['userName'], $user_id);
        }
    }


    public function createTOken($userId)
    {

        $user = $this->userRepository->getById($userId);
        $token = JWTAuth::fromUser($user);
        $user->token = $token;
        return $this->successResponse([
        'user' => $user,
    ], 'Login successfully');

    }
}
 