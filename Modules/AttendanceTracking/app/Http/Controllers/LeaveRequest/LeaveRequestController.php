<?php

namespace Modules\AttendanceTracking\Http\Controllers\LeaveRequest;

use Modules\AttendanceTracking\Repositories\LeaveRequest\LeaveRequestRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\AttendanceTracking\Transformers\BaseCollection\BaseCollection;

use Modules\AttendanceTracking\Http\Requests\LeaveRequest\LeaveRequestStoreRequest;
use Modules\AttendanceTracking\Http\Requests\LeaveRequest\LeaveRequestUpdateRequest;
use Modules\AttendanceTracking\Transformers\LeaveRequest\LeaveRequestResource;

class LeaveRequestController extends Controller
{
    use ApiResponseTrait;

    protected $LeaveRequestRepository;

    public function __construct(LeaveRequestRepositoryInterface $LeaveRequestRepository)
    {
        $this->LeaveRequestRepository = $LeaveRequestRepository;
    }

    public function index()
    {
        $data = $this->LeaveRequestRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'leaverequest', LeaveRequestResource::class),
                    'LeaveRequest list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->LeaveRequestRepository->find($id);
        if (!$data) {
            return $this->errorResponse('LeaveRequest not found', 404);
        }
        return $this->successResponse(new LeaveRequestResource($data), 'LeaveRequest retrieved successfully');
    }

    public function store(LeaveRequestStoreRequest $request)
    {
        $data = $this->LeaveRequestRepository->create($request->validated());
        return $this->successResponse(new LeaveRequestResource($data), 'LeaveRequest created successfully', 201);
    }

    public function update(LeaveRequestUpdateRequest $request, $id)
    {
        $data = $this->LeaveRequestRepository->update($id, $request->validated());
        return $this->successResponse(new LeaveRequestResource($data), 'LeaveRequest updated successfully');
    }

    public function destroy($id)
    {
        $this->LeaveRequestRepository->delete($id);
        return $this->successResponse(null, 'LeaveRequest deleted successfully');
    }
}
