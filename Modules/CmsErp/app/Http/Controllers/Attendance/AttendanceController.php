<?php

namespace Modules\CmsErp\Http\Controllers\Attendance;

use Modules\CmsErp\Repositories\Attendance\AttendanceRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\CmsErp\Transformers\BaseCollection\BaseCollection;

use Modules\CmsErp\Http\Requests\Attendance\AttendanceStoreRequest;
use Modules\CmsErp\Http\Requests\Attendance\AttendanceUpdateRequest;
use Modules\CmsErp\Transformers\Attendance\AttendanceResource;

class AttendanceController extends Controller
{
    use ApiResponseTrait;

    protected $AttendanceRepository;

    public function __construct(AttendanceRepositoryInterface $AttendanceRepository)
    {
        $this->AttendanceRepository = $AttendanceRepository;
    }

    public function index()
    {
        $data = $this->AttendanceRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'attendance', AttendanceResource::class),
                    'Attendance list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->AttendanceRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Attendance not found', 404);
        }
        return $this->successResponse(new AttendanceResource($data), 'Attendance retrieved successfully');
    }

    public function store(AttendanceStoreRequest $request)
    {
        $data = $this->AttendanceRepository->create($request->validated());
        return $this->successResponse(new AttendanceResource($data), 'Attendance created successfully', 201);
    }

    public function update(AttendanceUpdateRequest $request, $id)
    {
        $data = $this->AttendanceRepository->update($id, $request->validated());
        return $this->successResponse(new AttendanceResource($data), 'Attendance updated successfully');
    }

    public function destroy($id)
    {
        $this->AttendanceRepository->delete($id);
        return $this->successResponse(null, 'Attendance deleted successfully');
    }
}
