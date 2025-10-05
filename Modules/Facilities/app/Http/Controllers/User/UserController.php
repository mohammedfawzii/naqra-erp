<?php

namespace Modules\Facilities\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

use Modules\Facilities\Http\Requests\User\UserStoreRequest;
use Modules\Facilities\Http\Requests\User\UserUpdateRequest;
use Modules\Facilities\Repositories\User\UserRepositoryInterface;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;
use Modules\Facilities\Transformers\User\UserResource;

class UserController extends Controller
{
    use ApiResponseTrait;

    protected $UserRepository;

    public function __construct(UserRepositoryInterface $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function index()
    {


        $data = $this->UserRepository->all();

        return $this->successResponse(
            new BaseCollection($data, 'user', UserResource::class),
            'User list retrieved successfully'
        );
    }

    public function show($id)
    {
        $data = $this->UserRepository->find($id);
        if (!$data) {
            return $this->errorResponse('User not found', 404);
        }
        return $this->successResponse(new UserResource($data), 'User retrieved successfully');
    }

    public function store(UserStoreRequest $request)
    {
        $data = $this->UserRepository->create($request->validated());
        return $this->successResponse(new UserResource($data), 'User created successfully', 201);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $data = $this->UserRepository->update($id, $request->validated());
        return $this->successResponse(new UserResource($data), 'User updated successfully');
    }

    public function destroy($id)
    {
        $this->UserRepository->delete($id);
        return $this->successResponse(null, 'User deleted successfully');
    }
}
