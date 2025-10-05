<?php

namespace Modules\AttendanceTracking\Http\Controllers\AttendanceLeaveAnalytics;

use Modules\AttendanceTracking\Repositories\AttendanceLeaveAnalytics\AttendanceLeaveAnalyticsRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\AttendanceTracking\Transformers\BaseCollection\BaseCollection;

use Modules\AttendanceTracking\Http\Requests\AttendanceLeaveAnalytics\AttendanceLeaveAnalyticsStoreRequest;
use Modules\AttendanceTracking\Http\Requests\AttendanceLeaveAnalytics\AttendanceLeaveAnalyticsUpdateRequest;
use Modules\AttendanceTracking\Transformers\AttendanceLeaveAnalytics\AttendanceLeaveAnalyticsResource;

class AttendanceLeaveAnalyticsController extends Controller
{
    use ApiResponseTrait;

    protected $AttendanceLeaveAnalyticsRepository;

    public function __construct(AttendanceLeaveAnalyticsRepositoryInterface $AttendanceLeaveAnalyticsRepository)
    {
        $this->AttendanceLeaveAnalyticsRepository = $AttendanceLeaveAnalyticsRepository;
    }

    public function index()
    {
        $data = $this->AttendanceLeaveAnalyticsRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'attendanceleaveanalytics', AttendanceLeaveAnalyticsResource::class),
                    'AttendanceLeaveAnalytics list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->AttendanceLeaveAnalyticsRepository->find($id);
        if (!$data) {
            return $this->errorResponse('AttendanceLeaveAnalytics not found', 404);
        }
        return $this->successResponse(new AttendanceLeaveAnalyticsResource($data), 'AttendanceLeaveAnalytics retrieved successfully');
    }

    public function store(AttendanceLeaveAnalyticsStoreRequest $request)
    {
        $data = $this->AttendanceLeaveAnalyticsRepository->create($request->validated());
        return $this->successResponse(new AttendanceLeaveAnalyticsResource($data), 'AttendanceLeaveAnalytics created successfully', 201);
    }

    public function update(AttendanceLeaveAnalyticsUpdateRequest $request, $id)
    {
        $data = $this->AttendanceLeaveAnalyticsRepository->update($id, $request->validated());
        return $this->successResponse(new AttendanceLeaveAnalyticsResource($data), 'AttendanceLeaveAnalytics updated successfully');
    }

    public function destroy($id)
    {
        $this->AttendanceLeaveAnalyticsRepository->delete($id);
        return $this->successResponse(null, 'AttendanceLeaveAnalytics deleted successfully');
    }
}
