<?php

namespace Modules\AttendanceTracking\Http\Controllers\AiAttendanceInsights;

use Modules\AttendanceTracking\Repositories\AiAttendanceInsights\AiAttendanceInsightsRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\AttendanceTracking\Transformers\BaseCollection\BaseCollection;

use Modules\AttendanceTracking\Http\Requests\AiAttendanceInsights\AiAttendanceInsightsStoreRequest;
use Modules\AttendanceTracking\Http\Requests\AiAttendanceInsights\AiAttendanceInsightsUpdateRequest;
use Modules\AttendanceTracking\Transformers\AiAttendanceInsights\AiAttendanceInsightsResource;

class AiAttendanceInsightsController extends Controller
{
    use ApiResponseTrait;

    protected $AiAttendanceInsightsRepository;

    public function __construct(AiAttendanceInsightsRepositoryInterface $AiAttendanceInsightsRepository)
    {
        $this->AiAttendanceInsightsRepository = $AiAttendanceInsightsRepository;
    }

    public function index()
    {
        $data = $this->AiAttendanceInsightsRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'aiattendanceinsights', AiAttendanceInsightsResource::class),
                    'AiAttendanceInsights list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->AiAttendanceInsightsRepository->find($id);
        if (!$data) {
            return $this->errorResponse('AiAttendanceInsights not found', 404);
        }
        return $this->successResponse(new AiAttendanceInsightsResource($data), 'AiAttendanceInsights retrieved successfully');
    }

    public function store(AiAttendanceInsightsStoreRequest $request)
    {
        $data = $this->AiAttendanceInsightsRepository->create($request->validated());
        return $this->successResponse(new AiAttendanceInsightsResource($data), 'AiAttendanceInsights created successfully', 201);
    }

    public function update(AiAttendanceInsightsUpdateRequest $request, $id)
    {
        $data = $this->AiAttendanceInsightsRepository->update($id, $request->validated());
        return $this->successResponse(new AiAttendanceInsightsResource($data), 'AiAttendanceInsights updated successfully');
    }

    public function destroy($id)
    {
        $this->AiAttendanceInsightsRepository->delete($id);
        return $this->successResponse(null, 'AiAttendanceInsights deleted successfully');
    }
}
