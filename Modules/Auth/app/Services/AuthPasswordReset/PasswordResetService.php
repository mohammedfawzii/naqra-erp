<?php

namespace Modules\Auth\Services\AuthPasswordReset;

use App\Traits\ApiResponseTrait;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Repositories\Auth\AuthRepositoryInterface;

class PasswordResetService
{
    use ApiResponseTrait;
    public function __construct(protected AuthRepositoryInterface $authRepository) {}

    public function sendResetCode(string $filed, string $value)
    {
       
        $user = $this->authRepository->getByFieldFind($filed, $value);

        if (!$user) {
            return $this->errorResponse('User Not Found');
        }

        $token = rand(100000, 999999); // OTP code

        DB::table('password_resets')->updateOrInsert(
            ['method' => $filed],
            [
                'token' => Hash::make($token),
                'created_at' => now(),
            ]
        );

        return $token;
    }

    public function verifyCode(string $filed, string $code)
    {
        $record = DB::table('password_resets')->where('method', $filed)->first();

        if (!$record) {
            return $this->errorResponse('Invalid code');
        }

        $isExpired = Carbon::parse($record->created_at)->addMinutes(15)->isPast();
        $isValid = Hash::check($code, $record->token);

        if (!$isValid || $isExpired) {
            return $this->errorResponse('Invalid or expired code');
         }
        return $this->successResponse(null, 'Code verified successfully');

    }

 
}
