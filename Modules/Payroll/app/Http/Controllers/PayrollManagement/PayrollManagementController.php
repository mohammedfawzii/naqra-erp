<?php

namespace Modules\Payroll\Http\Controllers\PayrollManagement;

use Modules\Payroll\Repositories\PayrollManagement\PayrollManagementRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\PayrollManagement\PayrollManagementStoreRequest;
use Modules\Payroll\Http\Requests\PayrollManagement\PayrollManagementUpdateRequest;
use Modules\Payroll\Transformers\PayrollManagement\PayrollManagementResource;

class PayrollManagementController extends Controller
{
    use ApiResponseTrait;

    protected $PayrollManagementRepository;

    public function __construct(PayrollManagementRepositoryInterface $PayrollManagementRepository)
    {
        $this->PayrollManagementRepository = $PayrollManagementRepository;
    }

    public function index()
    {
        $data = $this->PayrollManagementRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'payrollmanagement', PayrollManagementResource::class),
                    'PayrollManagement list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->PayrollManagementRepository->find($id);
        if (!$data) {
            return $this->errorResponse('PayrollManagement not found', 404);
        }
        return $this->successResponse(new PayrollManagementResource($data), 'PayrollManagement retrieved successfully');
    }

    public function store(PayrollManagementStoreRequest $request)
    {
        $data = $this->PayrollManagementRepository->create($request->validated());
        return $this->successResponse(new PayrollManagementResource($data), 'PayrollManagement created successfully', 201);
    }

    public function update(PayrollManagementUpdateRequest $request, $id)
    {
        $data = $this->PayrollManagementRepository->update($id, $request->validated());
        return $this->successResponse(new PayrollManagementResource($data), 'PayrollManagement updated successfully');
    }

    public function destroy($id)
    {
        $this->PayrollManagementRepository->delete($id);
        return $this->successResponse(null, 'PayrollManagement deleted successfully');
    }
}
