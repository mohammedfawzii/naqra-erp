<?php

namespace Modules\AttendanceTracking\Http\Controllers\FlexibleLeaveManagement;

use Modules\AttendanceTracking\Repositories\FlexibleLeaveManagement\FlexibleLeaveManagementRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\AttendanceTracking\Transformers\BaseCollection\BaseCollection;

use Modules\AttendanceTracking\Http\Requests\FlexibleLeaveManagement\FlexibleLeaveManagementStoreRequest;
use Modules\AttendanceTracking\Http\Requests\FlexibleLeaveManagement\FlexibleLeaveManagementUpdateRequest;
use Modules\AttendanceTracking\Transformers\FlexibleLeaveManagement\FlexibleLeaveManagementResource;

class FlexibleLeaveManagementController extends Controller
{
    use ApiResponseTrait;

    protected $FlexibleLeaveManagementRepository;

    public function __construct(FlexibleLeaveManagementRepositoryInterface $FlexibleLeaveManagementRepository)
    {
        $this->FlexibleLeaveManagementRepository = $FlexibleLeaveManagementRepository;
    }

    public function index()
    {
        $data = $this->FlexibleLeaveManagementRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'flexibleleavemanagement', FlexibleLeaveManagementResource::class),
                    'FlexibleLeaveManagement list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->FlexibleLeaveManagementRepository->find($id);
        if (!$data) {
            return $this->errorResponse('FlexibleLeaveManagement not found', 404);
        }
        return $this->successResponse(new FlexibleLeaveManagementResource($data), 'FlexibleLeaveManagement retrieved successfully');
    }

    public function store(FlexibleLeaveManagementStoreRequest $request)
    {
        $data = $this->FlexibleLeaveManagementRepository->create($request->validated());
        return $this->successResponse(new FlexibleLeaveManagementResource($data), 'FlexibleLeaveManagement created successfully', 201);
    }

    public function update(FlexibleLeaveManagementUpdateRequest $request, $id)
    {
        $data = $this->FlexibleLeaveManagementRepository->update($id, $request->validated());
        return $this->successResponse(new FlexibleLeaveManagementResource($data), 'FlexibleLeaveManagement updated successfully');
    }

    public function destroy($id)
    {
        $this->FlexibleLeaveManagementRepository->delete($id);
        return $this->successResponse(null, 'FlexibleLeaveManagement deleted successfully');
    }
}
