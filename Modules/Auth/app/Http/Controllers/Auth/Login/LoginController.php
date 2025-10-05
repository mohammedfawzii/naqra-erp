<?php

namespace Modules\Auth\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Hash;
 use Modules\Auth\Http\Requests\Auth\Login\LoginRequest;
 use Modules\Auth\Repositories\Auth\AuthRepositoryInterface;
use Modules\Auth\Transformers\Auth\LoginResource;
 use Google\Client as GoogleClient;
use Modules\Auth\Http\Requests\Auth\Login\LoginByGoogleRequest;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    use ApiResponseTrait;
    public function __construct(protected AuthRepositoryInterface $authRepository)
    {
    }
    public function login(LoginRequest $request)
    {
         $data=$request->validated();
         $field = filter_var($data['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'userName';   
         $user =$this->authRepository->getByFiled($field,$data['login']);

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            return $this->errorResponse('The provided credentials are incorrect.', 401);
         }
        
        return $this->successResponse( new LoginResource($user), 'Login successfully');

    }

    // login by phone

     public function google(LoginByGoogleRequest $request)
    {
         $validated = $request->validated();

         $client = new GoogleClient(['client_id' => config('services.google.client_id')]);
        $payload = $client->verifyIdToken($validated['token']);

         if (!$payload) {
            return $this->errorResponse('Invalid Google token', 401);
        }

         $user = $this->storeNewUser($payload);

        return $this->successResponse( new LoginResource($user), 'Login successfully');

    }
 
    protected function storeNewUser(array $payload)
    {
        $googleId   = $payload['sub'];
        $email      = $payload['email'] ?? null;
        $givenName  = $payload['given_name'] ?? '';
        $familyName = $payload['family_name'] ?? '';
        $fullName   = trim("$givenName $familyName") ?: 'Unknown User';
 
         $data = [
            'google_id' => $googleId,
            'email'     => $email,
            'userName'  => $givenName ?: $fullName,
            'fullName'  => $fullName,
            'password'  => Hash::make(Str::random(16)),
            'phone'     => '0000',

        ];

         return $this->authRepository->firstOrCreate($googleId,$data);
    }

}