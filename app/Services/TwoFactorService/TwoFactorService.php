<?php

namespace App\Services\TwoFactorService;

use App\Models\UserTwoFactor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use PragmaRX\Google2FA\Google2FA;
use Modules\Auth\Repositories\UserTwoFactor\UserTwoFactorRepositoryInterface;
use Throwable;

class TwoFactorService
{
    protected Google2FA $google2fa;
     
    public function __construct(protected UserTwoFactorRepositoryInterface $repository) {
        $this->google2fa = new Google2FA();
     }

    /**
     * Generate all verification factors for a user (email, sms, app)
     */
    // public function generateAllFactors(int $userId, int $ttlMinutes = 5): array
    // {
    //     $now = now();
    //     $expiresAt = Carbon::now()->addMinutes($ttlMinutes);

    //     $records = [
    //         $this->buildFactor($userId, 'email', random_int(100000, 999999), $expiresAt, $now),
    //         $this->buildFactor($userId, 'sms', random_int(100000, 999999), $expiresAt, $now),
    //         $this->buildFactor($userId, 'app', null, null, $now, $this->google2fa->generateSecretKey()),
    //     ];

    //     UserTwoFactor::insert($records);

    //     return [
    //         'email_otp'  => $records[0]['raw_otp'],
    //         'sms_otp'    => $records[1]['raw_otp'],
    //         'app_secret' => $records[2]['secret'],
    //     ];
    // }

    /**
     * Handle resending a verification code
     */
    public function resendCode(int $userId, string $method, int $ttlMinutes = 5, string $action = 'resend')
    {
         try {
            $record = $this->repository->getByUserAndMethod($userId, $method);

            if (!$record) {
                return $this->response(false, 'No verification record found.');
            }

            if ($record->is_verified && $action === 'resend') {
                return $this->response(false, 'This method is already verified.');
            }

            return match ($method) {
                'email', 'sms' => $this->handleOtpResend($record, $ttlMinutes),
                'app'          => $this->response(false, 'App-based verification cannot be resent.'),
                default         => $this->response(false, 'Unsupported verification method.'),
            };
        } catch (Throwable $e) {
            Log::error('TwoFactorService::resendCode failed', [
                'user_id' => $userId,
                'method'  => $method,
                'error'   => $e->getMessage(),
            ]);

            return $this->response(false, 'An internal error occurred while resending the verification code.');
        }
    }

    /**
     * Resend OTP logic (shared between email & sms)
     */
    private function handleOtpResend($record, int $ttlMinutes): array
    {
        $otp = random_int(100000, 999999);

        $record->update([
            'otp_code'       => bcrypt((string)$otp),
            'otp_expires_at' => now()->addMinutes($ttlMinutes),
            'is_verified'    => false,
        ]);

        return $this->response(true, 'Verification code resent successfully.', [
            'otp' => (string)$otp,
        ]);
    }

    /**
     * Helper to create a verification record
     */
    
    /**
     * Unified response helper
     */
    private function response(bool $success, string $message, array $extra = []): array
    {
        return array_merge([
            'success' => $success,
            'message' => $message,
        ], $extra);
    }
}
