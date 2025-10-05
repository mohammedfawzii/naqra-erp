<?php

namespace Modules\AttendanceTracking\Http\Controllers\AiAttendanceInsight;

use Modules\AttendanceTracking\Repositories\AiAttendanceInsight\AiAttendanceInsightRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\AttendanceTracking\Transformers\BaseCollection\BaseCollection;

use Modules\AttendanceTracking\Http\Requests\AiAttendanceInsight\AiAttendanceInsightStoreRequest;
use Modules\AttendanceTracking\Http\Requests\AiAttendanceInsight\AiAttendanceInsightUpdateRequest;
use Modules\AttendanceTracking\Transformers\AiAttendanceInsight\AiAttendanceInsightResource;

class AiAttendanceInsightController extends Controller
{
    use ApiResponseTrait;

    protected $AiAttendanceInsightRepository;

    public function __construct(AiAttendanceInsightRepositoryInterface $AiAttendanceInsightRepository)
    {
        $this->AiAttendanceInsightRepository = $AiAttendanceInsightRepository;
    }

    public function index()
    {
        $data = $this->AiAttendanceInsightRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'aiattendanceinsight', AiAttendanceInsightResource::class),
                    'AiAttendanceInsight list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->AiAttendanceInsightRepository->find($id);
        if (!$data) {
            return $this->errorResponse('AiAttendanceInsight not found', 404);
        }
        return $this->successResponse(new AiAttendanceInsightResource($data), 'AiAttendanceInsight retrieved successfully');
    }

    public function store(AiAttendanceInsightStoreRequest $request)
    {
        $data = $this->AiAttendanceInsightRepository->create($request->validated());
        return $this->successResponse(new AiAttendanceInsightResource($data), 'AiAttendanceInsight created successfully', 201);
    }

    public function update(AiAttendanceInsightUpdateRequest $request, $id)
    {
        $data = $this->AiAttendanceInsightRepository->update($id, $request->validated());
        return $this->successResponse(new AiAttendanceInsightResource($data), 'AiAttendanceInsight updated successfully');
    }

    public function destroy($id)
    {
        $this->AiAttendanceInsightRepository->delete($id);
        return $this->successResponse(null, 'AiAttendanceInsight deleted successfully');
    }
}
