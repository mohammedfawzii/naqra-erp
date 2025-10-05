<?php

namespace Modules\Auth\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Modules\Auth\Http\Requests\Auth\Register\RegisterRequest;
use Modules\Auth\Repositories\Auth\AuthRepositoryInterface;
use Modules\Auth\Services\Factors\SendAllFactorsService;
use Modules\Auth\Transformers\Auth\RegisterResource;

class RegisterController extends Controller
{
  use ApiResponseTrait;

  public function __construct(
    protected AuthRepositoryInterface $authRepository,
    protected SendAllFactorsService $sendAllFactorsService,
  ) {}

  public function register(RegisterRequest $request)
  {

    $data = $request->validated();
    $user = $this->authRepository->create($data);
    $sendTwoFactorCode = $this->sendAllFactorsService->generateAllFactors($user->id);
    $user->two_factor = $sendTwoFactorCode;
    return $this->successData(new RegisterResource($user), 'User registered successfully', 201);
  }

   
}
