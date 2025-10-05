<?php

namespace Modules\Payroll\Http\Controllers\LoanType;

use Modules\Payroll\Repositories\LoanType\LoanTypeRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\LoanType\LoanTypeStoreRequest;
use Modules\Payroll\Http\Requests\LoanType\LoanTypeUpdateRequest;
use Modules\Payroll\Transformers\LoanType\LoanTypeResource;

class LoanTypeController extends Controller
{
    use ApiResponseTrait;

    protected $LoanTypeRepository;

    public function __construct(LoanTypeRepositoryInterface $LoanTypeRepository)
    {
        $this->LoanTypeRepository = $LoanTypeRepository;
    }

    public function index()
    {
        $data = $this->LoanTypeRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'loantype', LoanTypeResource::class),
                    'LoanType list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->LoanTypeRepository->find($id);
        if (!$data) {
            return $this->errorResponse('LoanType not found', 404);
        }
        return $this->successResponse(new LoanTypeResource($data), 'LoanType retrieved successfully');
    }

    public function store(LoanTypeStoreRequest $request)
    {
        $data = $this->LoanTypeRepository->create($request->validated());
        return $this->successResponse(new LoanTypeResource($data), 'LoanType created successfully', 201);
    }

    public function update(LoanTypeUpdateRequest $request, $id)
    {
        $data = $this->LoanTypeRepository->update($id, $request->validated());
        return $this->successResponse(new LoanTypeResource($data), 'LoanType updated successfully');
    }

    public function destroy($id)
    {
        $this->LoanTypeRepository->delete($id);
        return $this->successResponse(null, 'LoanType deleted successfully');
    }
}
