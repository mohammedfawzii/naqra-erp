<?php

namespace Modules\Payroll\Http\Controllers\PaidLeaveManagement;

use Modules\Payroll\Repositories\PaidLeaveManagement\PaidLeaveManagementRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\PaidLeaveManagement\PaidLeaveManagementStoreRequest;
use Modules\Payroll\Http\Requests\PaidLeaveManagement\PaidLeaveManagementUpdateRequest;
use Modules\Payroll\Transformers\PaidLeaveManagement\PaidLeaveManagementResource;

class PaidLeaveManagementController extends Controller
{
    use ApiResponseTrait;

    protected $PaidLeaveManagementRepository;

    public function __construct(PaidLeaveManagementRepositoryInterface $PaidLeaveManagementRepository)
    {
        $this->PaidLeaveManagementRepository = $PaidLeaveManagementRepository;
    }

    public function index()
    {
        $data = $this->PaidLeaveManagementRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'paidleavemanagement', PaidLeaveManagementResource::class),
                    'PaidLeaveManagement list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->PaidLeaveManagementRepository->find($id);
        if (!$data) {
            return $this->errorResponse('PaidLeaveManagement not found', 404);
        }
        return $this->successResponse(new PaidLeaveManagementResource($data), 'PaidLeaveManagement retrieved successfully');
    }

    public function store(PaidLeaveManagementStoreRequest $request)
    {
        $data = $this->PaidLeaveManagementRepository->create($request->validated());
        return $this->successResponse(new PaidLeaveManagementResource($data), 'PaidLeaveManagement created successfully', 201);
    }

    public function update(PaidLeaveManagementUpdateRequest $request, $id)
    {
        $data = $this->PaidLeaveManagementRepository->update($id, $request->validated());
        return $this->successResponse(new PaidLeaveManagementResource($data), 'PaidLeaveManagement updated successfully');
    }

    public function destroy($id)
    {
        $this->PaidLeaveManagementRepository->delete($id);
        return $this->successResponse(null, 'PaidLeaveManagement deleted successfully');
    }
}
