<?php

namespace Modules\Payroll\Http\Controllers\AttendanceManagement;

use Modules\Payroll\Repositories\AttendanceManagement\AttendanceManagementRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\AttendanceManagement\AttendanceManagementStoreRequest;
use Modules\Payroll\Http\Requests\AttendanceManagement\AttendanceManagementUpdateRequest;
use Modules\Payroll\Transformers\AttendanceManagement\AttendanceManagementResource;

class AttendanceManagementController extends Controller
{
    use ApiResponseTrait;

    protected $AttendanceManagementRepository;

    public function __construct(AttendanceManagementRepositoryInterface $AttendanceManagementRepository)
    {
        $this->AttendanceManagementRepository = $AttendanceManagementRepository;
    }

    public function index()
    {
        $data = $this->AttendanceManagementRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'attendancemanagement', AttendanceManagementResource::class),
                    'AttendanceManagement list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->AttendanceManagementRepository->find($id);
        if (!$data) {
            return $this->errorResponse('AttendanceManagement not found', 404);
        }
        return $this->successResponse(new AttendanceManagementResource($data), 'AttendanceManagement retrieved successfully');
    }

    public function store(AttendanceManagementStoreRequest $request)
    {
        $data = $this->AttendanceManagementRepository->create($request->validated());
        return $this->successResponse(new AttendanceManagementResource($data), 'AttendanceManagement created successfully', 201);
    }

    public function update(AttendanceManagementUpdateRequest $request, $id)
    {
        $data = $this->AttendanceManagementRepository->update($id, $request->validated());
        return $this->successResponse(new AttendanceManagementResource($data), 'AttendanceManagement updated successfully');
    }

    public function destroy($id)
    {
        $this->AttendanceManagementRepository->delete($id);
        return $this->successResponse(null, 'AttendanceManagement deleted successfully');
    }
}
