<?php

namespace Modules\AttendanceTracking\Http\Controllers\AttendanceTracking;

use Modules\AttendanceTracking\Repositories\AttendanceTracking\AttendanceTrackingRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\AttendanceTracking\Transformers\BaseCollection\BaseCollection;

use Modules\AttendanceTracking\Http\Requests\AttendanceTracking\AttendanceTrackingStoreRequest;
use Modules\AttendanceTracking\Http\Requests\AttendanceTracking\AttendanceTrackingUpdateRequest;
use Modules\AttendanceTracking\Transformers\AttendanceTracking\AttendanceTrackingResource;

class AttendanceTrackingController extends Controller
{
    use ApiResponseTrait;

    protected $AttendanceTrackingRepository;

    public function __construct(AttendanceTrackingRepositoryInterface $AttendanceTrackingRepository)
    {
        $this->AttendanceTrackingRepository = $AttendanceTrackingRepository;
    }

    public function index()
    {
        $data = $this->AttendanceTrackingRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'attendancetracking', AttendanceTrackingResource::class),
                    'AttendanceTracking list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->AttendanceTrackingRepository->find($id);
        if (!$data) {
            return $this->errorResponse('AttendanceTracking not found', 404);
        }
        return $this->successResponse(new AttendanceTrackingResource($data), 'AttendanceTracking retrieved successfully');
    }

    public function store(AttendanceTrackingStoreRequest $request)
    {
        $data = $this->AttendanceTrackingRepository->create($request->validated());
        return $this->successResponse(new AttendanceTrackingResource($data), 'AttendanceTracking created successfully', 201);
    }

    public function update(AttendanceTrackingUpdateRequest $request, $id)
    {
        $data = $this->AttendanceTrackingRepository->update($id, $request->validated());
        return $this->successResponse(new AttendanceTrackingResource($data), 'AttendanceTracking updated successfully');
    }

    public function destroy($id)
    {
        $this->AttendanceTrackingRepository->delete($id);
        return $this->successResponse(null, 'AttendanceTracking deleted successfully');
    }
}
