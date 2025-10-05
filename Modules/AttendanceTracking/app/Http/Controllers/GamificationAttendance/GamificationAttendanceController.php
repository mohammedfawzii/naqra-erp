<?php

namespace Modules\AttendanceTracking\Http\Controllers\GamificationAttendance;

use Modules\AttendanceTracking\Repositories\GamificationAttendance\GamificationAttendanceRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\AttendanceTracking\Transformers\BaseCollection\BaseCollection;

use Modules\AttendanceTracking\Http\Requests\GamificationAttendance\GamificationAttendanceStoreRequest;
use Modules\AttendanceTracking\Http\Requests\GamificationAttendance\GamificationAttendanceUpdateRequest;
use Modules\AttendanceTracking\Transformers\GamificationAttendance\GamificationAttendanceResource;

class GamificationAttendanceController extends Controller
{
    use ApiResponseTrait;

    protected $GamificationAttendanceRepository;

    public function __construct(GamificationAttendanceRepositoryInterface $GamificationAttendanceRepository)
    {
        $this->GamificationAttendanceRepository = $GamificationAttendanceRepository;
    }

    public function index()
    {
        $data = $this->GamificationAttendanceRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'gamificationattendance', GamificationAttendanceResource::class),
                    'GamificationAttendance list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->GamificationAttendanceRepository->find($id);
        if (!$data) {
            return $this->errorResponse('GamificationAttendance not found', 404);
        }
        return $this->successResponse(new GamificationAttendanceResource($data), 'GamificationAttendance retrieved successfully');
    }

    public function store(GamificationAttendanceStoreRequest $request)
    {
        $data = $this->GamificationAttendanceRepository->create($request->validated());
        return $this->successResponse(new GamificationAttendanceResource($data), 'GamificationAttendance created successfully', 201);
    }

    public function update(GamificationAttendanceUpdateRequest $request, $id)
    {
        $data = $this->GamificationAttendanceRepository->update($id, $request->validated());
        return $this->successResponse(new GamificationAttendanceResource($data), 'GamificationAttendance updated successfully');
    }

    public function destroy($id)
    {
        $this->GamificationAttendanceRepository->delete($id);
        return $this->successResponse(null, 'GamificationAttendance deleted successfully');
    }
}
