<?php

namespace Modules\Auth\Services\Factors;

use App\Models\UserTwoFactor;
use Carbon\Carbon;
use PragmaRX\Google2FA\Google2FA;


class SendAllFactorsService
{
    protected Google2FA $google2fa;

    public function __construct()
    {
        $this->google2fa = new Google2FA();
    }

    public function generateAllFactors(int $userId, int $ttlMinutes = 5)
    {
        $now = now();
        $expiresAt = Carbon::now()->addMinutes($ttlMinutes);

        $records = [
            $this->buildFactor($userId, 'email', random_int(100000, 999999), $expiresAt, $now),
            $this->buildFactor($userId, 'sms', random_int(100000, 999999), $expiresAt, $now),
            $this->buildFactor($userId, 'app', null, null, $now, $this->google2fa->generateSecretKey()),
        ];

        $emailOtp = $records[0]['raw_otp'];
        $smsOtp   = $records[1]['raw_otp'];
        $appSecret = $records[2]['secret'];

        $records = array_map(function ($record) {
            unset($record['raw_otp']);
            return $record;
        }, $records);

        UserTwoFactor::insert($records);

        return [
            'email_otp'  => $emailOtp,
            'sms_otp'    => $smsOtp,
            'app_secret' => $appSecret,
        ];
    }

    private function buildFactor(
        int $userId,
        string $method,
        ?int $otp,
        ?Carbon $expiresAt,
        Carbon $now,
        ?string $secret = null
    ): array {
        return [
            'user_id'        => $userId,
            'method'         => $method,
            'otp_code'       => $otp ? bcrypt((string)$otp) : null,
            'otp_expires_at' => $expiresAt,
            'secret'         => $secret,
            'is_verified'    => false,
            'created_at'     => $now,
            'updated_at'     => $now,
            'raw_otp'        => $otp,
        ];
    }
}
