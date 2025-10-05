<?php

namespace Modules\Payroll\Http\Controllers\LoanDeductions;

use Modules\Payroll\Repositories\LoanDeductions\LoanDeductionsRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\LoanDeductions\LoanDeductionsStoreRequest;
use Modules\Payroll\Http\Requests\LoanDeductions\LoanDeductionsUpdateRequest;
use Modules\Payroll\Transformers\LoanDeductions\LoanDeductionsResource;

class LoanDeductionsController extends Controller
{
    use ApiResponseTrait;

    protected $LoanDeductionsRepository;

    public function __construct(LoanDeductionsRepositoryInterface $LoanDeductionsRepository)
    {
        $this->LoanDeductionsRepository = $LoanDeductionsRepository;
    }

    public function index()
    {
        $data = $this->LoanDeductionsRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'loandeductions', LoanDeductionsResource::class),
                    'LoanDeductions list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->LoanDeductionsRepository->find($id);
        if (!$data) {
            return $this->errorResponse('LoanDeductions not found', 404);
        }
        return $this->successResponse(new LoanDeductionsResource($data), 'LoanDeductions retrieved successfully');
    }

    public function store(LoanDeductionsStoreRequest $request)
    {
        $data = $this->LoanDeductionsRepository->create($request->validated());
        return $this->successResponse(new LoanDeductionsResource($data), 'LoanDeductions created successfully', 201);
    }

    public function update(LoanDeductionsUpdateRequest $request, $id)
    {
        $data = $this->LoanDeductionsRepository->update($id, $request->validated());
        return $this->successResponse(new LoanDeductionsResource($data), 'LoanDeductions updated successfully');
    }

    public function destroy($id)
    {
        $this->LoanDeductionsRepository->delete($id);
        return $this->successResponse(null, 'LoanDeductions deleted successfully');
    }
}
