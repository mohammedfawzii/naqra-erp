<?php

namespace Modules\AttendanceTracking\Http\Controllers\ShiftSchedule;

use Modules\AttendanceTracking\Repositories\ShiftSchedule\ShiftScheduleRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\AttendanceTracking\Transformers\BaseCollection\BaseCollection;

use Modules\AttendanceTracking\Http\Requests\ShiftSchedule\ShiftScheduleStoreRequest;
use Modules\AttendanceTracking\Http\Requests\ShiftSchedule\ShiftScheduleUpdateRequest;
use Modules\AttendanceTracking\Transformers\ShiftSchedule\ShiftScheduleResource;

class ShiftScheduleController extends Controller
{
    use ApiResponseTrait;

    protected $ShiftScheduleRepository;

    public function __construct(ShiftScheduleRepositoryInterface $ShiftScheduleRepository)
    {
        $this->ShiftScheduleRepository = $ShiftScheduleRepository;
    }

    public function index()
    {
        $data = $this->ShiftScheduleRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'shiftschedule', ShiftScheduleResource::class),
                    'ShiftSchedule list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->ShiftScheduleRepository->find($id);
        if (!$data) {
            return $this->errorResponse('ShiftSchedule not found', 404);
        }
        return $this->successResponse(new ShiftScheduleResource($data), 'ShiftSchedule retrieved successfully');
    }

    public function store(ShiftScheduleStoreRequest $request)
    {
        $data = $this->ShiftScheduleRepository->create($request->validated());
        return $this->successResponse(new ShiftScheduleResource($data), 'ShiftSchedule created successfully', 201);
    }

    public function update(ShiftScheduleUpdateRequest $request, $id)
    {
        $data = $this->ShiftScheduleRepository->update($id, $request->validated());
        return $this->successResponse(new ShiftScheduleResource($data), 'ShiftSchedule updated successfully');
    }

    public function destroy($id)
    {
        $this->ShiftScheduleRepository->delete($id);
        return $this->successResponse(null, 'ShiftSchedule deleted successfully');
    }
}
