<?php

namespace Modules\Payroll\Http\Controllers\EmployeePaymentManagement;

use Modules\Payroll\Repositories\EmployeePaymentManagement\EmployeePaymentManagementRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\EmployeePaymentManagement\EmployeePaymentManagementStoreRequest;
use Modules\Payroll\Http\Requests\EmployeePaymentManagement\EmployeePaymentManagementUpdateRequest;
use Modules\Payroll\Transformers\EmployeePaymentManagement\EmployeePaymentManagementResource;

class EmployeePaymentManagementController extends Controller
{
    use ApiResponseTrait;

    protected $EmployeePaymentManagementRepository;

    public function __construct(EmployeePaymentManagementRepositoryInterface $EmployeePaymentManagementRepository)
    {
        $this->EmployeePaymentManagementRepository = $EmployeePaymentManagementRepository;
    }

    public function index()
    {
        $data = $this->EmployeePaymentManagementRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'employeepaymentmanagement', EmployeePaymentManagementResource::class),
                    'EmployeePaymentManagement list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->EmployeePaymentManagementRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EmployeePaymentManagement not found', 404);
        }
        return $this->successResponse(new EmployeePaymentManagementResource($data), 'EmployeePaymentManagement retrieved successfully');
    }

    public function store(EmployeePaymentManagementStoreRequest $request)
    {
        $data = $this->EmployeePaymentManagementRepository->create($request->validated());
        return $this->successResponse(new EmployeePaymentManagementResource($data), 'EmployeePaymentManagement created successfully', 201);
    }

    public function update(EmployeePaymentManagementUpdateRequest $request, $id)
    {
        $data = $this->EmployeePaymentManagementRepository->update($id, $request->validated());
        return $this->successResponse(new EmployeePaymentManagementResource($data), 'EmployeePaymentManagement updated successfully');
    }

    public function destroy($id)
    {
        $this->EmployeePaymentManagementRepository->delete($id);
        return $this->successResponse(null, 'EmployeePaymentManagement deleted successfully');
    }
}
