<?php

namespace Modules\AttendanceTracking\Http\Controllers\RemoteAttendance;

use Modules\AttendanceTracking\Repositories\RemoteAttendance\RemoteAttendanceRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\AttendanceTracking\Transformers\BaseCollection\BaseCollection;

use Modules\AttendanceTracking\Http\Requests\RemoteAttendance\RemoteAttendanceStoreRequest;
use Modules\AttendanceTracking\Http\Requests\RemoteAttendance\RemoteAttendanceUpdateRequest;
use Modules\AttendanceTracking\Transformers\RemoteAttendance\RemoteAttendanceResource;

class RemoteAttendanceController extends Controller
{
    use ApiResponseTrait;

    protected $RemoteAttendanceRepository;

    public function __construct(RemoteAttendanceRepositoryInterface $RemoteAttendanceRepository)
    {
        $this->RemoteAttendanceRepository = $RemoteAttendanceRepository;
    }

    public function index()
    {
        $data = $this->RemoteAttendanceRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'remoteattendance', RemoteAttendanceResource::class),
                    'RemoteAttendance list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->RemoteAttendanceRepository->find($id);
        if (!$data) {
            return $this->errorResponse('RemoteAttendance not found', 404);
        }
        return $this->successResponse(new RemoteAttendanceResource($data), 'RemoteAttendance retrieved successfully');
    }

    public function store(RemoteAttendanceStoreRequest $request)
    {
        $data = $this->RemoteAttendanceRepository->create($request->validated());
        return $this->successResponse(new RemoteAttendanceResource($data), 'RemoteAttendance created successfully', 201);
    }

    public function update(RemoteAttendanceUpdateRequest $request, $id)
    {
        $data = $this->RemoteAttendanceRepository->update($id, $request->validated());
        return $this->successResponse(new RemoteAttendanceResource($data), 'RemoteAttendance updated successfully');
    }

    public function destroy($id)
    {
        $this->RemoteAttendanceRepository->delete($id);
        return $this->successResponse(null, 'RemoteAttendance deleted successfully');
    }
}
