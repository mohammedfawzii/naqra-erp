<?php

namespace Modules\AttendanceTracking\Http\Controllers\BiometricIntegration;

use Modules\AttendanceTracking\Repositories\BiometricIntegration\BiometricIntegrationRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\AttendanceTracking\Transformers\BaseCollection\BaseCollection;

use Modules\AttendanceTracking\Http\Requests\BiometricIntegration\BiometricIntegrationStoreRequest;
use Modules\AttendanceTracking\Http\Requests\BiometricIntegration\BiometricIntegrationUpdateRequest;
use Modules\AttendanceTracking\Transformers\BiometricIntegration\BiometricIntegrationResource;

class BiometricIntegrationController extends Controller
{
    use ApiResponseTrait;

    protected $BiometricIntegrationRepository;

    public function __construct(BiometricIntegrationRepositoryInterface $BiometricIntegrationRepository)
    {
        $this->BiometricIntegrationRepository = $BiometricIntegrationRepository;
    }

    public function index()
    {
        $data = $this->BiometricIntegrationRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'biometricintegration', BiometricIntegrationResource::class),
                    'BiometricIntegration list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->BiometricIntegrationRepository->find($id);
        if (!$data) {
            return $this->errorResponse('BiometricIntegration not found', 404);
        }
        return $this->successResponse(new BiometricIntegrationResource($data), 'BiometricIntegration retrieved successfully');
    }

    public function store(BiometricIntegrationStoreRequest $request)
    {
        $data = $this->BiometricIntegrationRepository->create($request->validated());
        return $this->successResponse(new BiometricIntegrationResource($data), 'BiometricIntegration created successfully', 201);
    }

    public function update(BiometricIntegrationUpdateRequest $request, $id)
    {
        $data = $this->BiometricIntegrationRepository->update($id, $request->validated());
        return $this->successResponse(new BiometricIntegrationResource($data), 'BiometricIntegration updated successfully');
    }

    public function destroy($id)
    {
        $this->BiometricIntegrationRepository->delete($id);
        return $this->successResponse(null, 'BiometricIntegration deleted successfully');
    }
}
