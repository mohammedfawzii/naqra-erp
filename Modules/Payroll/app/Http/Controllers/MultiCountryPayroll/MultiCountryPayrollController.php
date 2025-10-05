<?php

namespace Modules\Payroll\Http\Controllers\MultiCountryPayroll;

use Modules\Payroll\Repositories\MultiCountryPayroll\MultiCountryPayrollRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\MultiCountryPayroll\MultiCountryPayrollStoreRequest;
use Modules\Payroll\Http\Requests\MultiCountryPayroll\MultiCountryPayrollUpdateRequest;
use Modules\Payroll\Transformers\MultiCountryPayroll\MultiCountryPayrollResource;

class MultiCountryPayrollController extends Controller
{
    use ApiResponseTrait;

    protected $MultiCountryPayrollRepository;

    public function __construct(MultiCountryPayrollRepositoryInterface $MultiCountryPayrollRepository)
    {
        $this->MultiCountryPayrollRepository = $MultiCountryPayrollRepository;
    }

    public function index()
    {
        $data = $this->MultiCountryPayrollRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'multicountrypayroll', MultiCountryPayrollResource::class),
                    'MultiCountryPayroll list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->MultiCountryPayrollRepository->find($id);
        if (!$data) {
            return $this->errorResponse('MultiCountryPayroll not found', 404);
        }
        return $this->successResponse(new MultiCountryPayrollResource($data), 'MultiCountryPayroll retrieved successfully');
    }

    public function store(MultiCountryPayrollStoreRequest $request)
    {
        $data = $this->MultiCountryPayrollRepository->create($request->validated());
        return $this->successResponse(new MultiCountryPayrollResource($data), 'MultiCountryPayroll created successfully', 201);
    }

    public function update(MultiCountryPayrollUpdateRequest $request, $id)
    {
        $data = $this->MultiCountryPayrollRepository->update($id, $request->validated());
        return $this->successResponse(new MultiCountryPayrollResource($data), 'MultiCountryPayroll updated successfully');
    }

    public function destroy($id)
    {
        $this->MultiCountryPayrollRepository->delete($id);
        return $this->successResponse(null, 'MultiCountryPayroll deleted successfully');
    }
}
