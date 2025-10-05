<?php

namespace Modules\AttendanceTracking\Http\Controllers\TimeTrackingIntegration;

use Modules\AttendanceTracking\Repositories\TimeTrackingIntegration\TimeTrackingIntegrationRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\AttendanceTracking\Transformers\BaseCollection\BaseCollection;

use Modules\AttendanceTracking\Http\Requests\TimeTrackingIntegration\TimeTrackingIntegrationStoreRequest;
use Modules\AttendanceTracking\Http\Requests\TimeTrackingIntegration\TimeTrackingIntegrationUpdateRequest;
use Modules\AttendanceTracking\Transformers\TimeTrackingIntegration\TimeTrackingIntegrationResource;

class TimeTrackingIntegrationController extends Controller
{
    use ApiResponseTrait;

    protected $TimeTrackingIntegrationRepository;

    public function __construct(TimeTrackingIntegrationRepositoryInterface $TimeTrackingIntegrationRepository)
    {
        $this->TimeTrackingIntegrationRepository = $TimeTrackingIntegrationRepository;
    }

    public function index()
    {
        $data = $this->TimeTrackingIntegrationRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'timetrackingintegration', TimeTrackingIntegrationResource::class),
                    'TimeTrackingIntegration list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->TimeTrackingIntegrationRepository->find($id);
        if (!$data) {
            return $this->errorResponse('TimeTrackingIntegration not found', 404);
        }
        return $this->successResponse(new TimeTrackingIntegrationResource($data), 'TimeTrackingIntegration retrieved successfully');
    }

    public function store(TimeTrackingIntegrationStoreRequest $request)
    {
        $data = $this->TimeTrackingIntegrationRepository->create($request->validated());
        return $this->successResponse(new TimeTrackingIntegrationResource($data), 'TimeTrackingIntegration created successfully', 201);
    }

    public function update(TimeTrackingIntegrationUpdateRequest $request, $id)
    {
        $data = $this->TimeTrackingIntegrationRepository->update($id, $request->validated());
        return $this->successResponse(new TimeTrackingIntegrationResource($data), 'TimeTrackingIntegration updated successfully');
    }

    public function destroy($id)
    {
        $this->TimeTrackingIntegrationRepository->delete($id);
        return $this->successResponse(null, 'TimeTrackingIntegration deleted successfully');
    }
}
