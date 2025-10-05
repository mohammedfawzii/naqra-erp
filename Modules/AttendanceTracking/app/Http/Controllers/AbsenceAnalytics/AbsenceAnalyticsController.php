<?php

namespace Modules\AttendanceTracking\Http\Controllers\AbsenceAnalytics;

use Modules\AttendanceTracking\Repositories\AbsenceAnalytics\AbsenceAnalyticsRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\AttendanceTracking\Transformers\BaseCollection\BaseCollection;

use Modules\AttendanceTracking\Http\Requests\AbsenceAnalytics\AbsenceAnalyticsStoreRequest;
use Modules\AttendanceTracking\Http\Requests\AbsenceAnalytics\AbsenceAnalyticsUpdateRequest;
use Modules\AttendanceTracking\Transformers\AbsenceAnalytics\AbsenceAnalyticsResource;

class AbsenceAnalyticsController extends Controller
{
    use ApiResponseTrait;

    protected $AbsenceAnalyticsRepository;

    public function __construct(AbsenceAnalyticsRepositoryInterface $AbsenceAnalyticsRepository)
    {
        $this->AbsenceAnalyticsRepository = $AbsenceAnalyticsRepository;
    }

    public function index()
    {
        $data = $this->AbsenceAnalyticsRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'absenceanalytics', AbsenceAnalyticsResource::class),
                    'AbsenceAnalytics list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->AbsenceAnalyticsRepository->find($id);
        if (!$data) {
            return $this->errorResponse('AbsenceAnalytics not found', 404);
        }
        return $this->successResponse(new AbsenceAnalyticsResource($data), 'AbsenceAnalytics retrieved successfully');
    }

    public function store(AbsenceAnalyticsStoreRequest $request)
    {
        $data = $this->AbsenceAnalyticsRepository->create($request->validated());
        return $this->successResponse(new AbsenceAnalyticsResource($data), 'AbsenceAnalytics created successfully', 201);
    }

    public function update(AbsenceAnalyticsUpdateRequest $request, $id)
    {
        $data = $this->AbsenceAnalyticsRepository->update($id, $request->validated());
        return $this->successResponse(new AbsenceAnalyticsResource($data), 'AbsenceAnalytics updated successfully');
    }

    public function destroy($id)
    {
        $this->AbsenceAnalyticsRepository->delete($id);
        return $this->successResponse(null, 'AbsenceAnalytics deleted successfully');
    }
}
