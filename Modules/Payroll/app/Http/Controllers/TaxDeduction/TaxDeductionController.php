<?php

namespace Modules\Payroll\Http\Controllers\TaxDeduction;

use Modules\Payroll\Repositories\TaxDeduction\TaxDeductionRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\TaxDeduction\TaxDeductionStoreRequest;
use Modules\Payroll\Http\Requests\TaxDeduction\TaxDeductionUpdateRequest;
use Modules\Payroll\Transformers\TaxDeduction\TaxDeductionResource;

class TaxDeductionController extends Controller
{
    use ApiResponseTrait;

    protected $TaxDeductionRepository;

    public function __construct(TaxDeductionRepositoryInterface $TaxDeductionRepository)
    {
        $this->TaxDeductionRepository = $TaxDeductionRepository;
    }

    public function index()
    {
        $data = $this->TaxDeductionRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'taxdeduction', TaxDeductionResource::class),
                    'TaxDeduction list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->TaxDeductionRepository->find($id);
        if (!$data) {
            return $this->errorResponse('TaxDeduction not found', 404);
        }
        return $this->successResponse(new TaxDeductionResource($data), 'TaxDeduction retrieved successfully');
    }

    public function store(TaxDeductionStoreRequest $request)
    {
        $data = $this->TaxDeductionRepository->create($request->validated());
        return $this->successResponse(new TaxDeductionResource($data), 'TaxDeduction created successfully', 201);
    }

    public function update(TaxDeductionUpdateRequest $request, $id)
    {
        $data = $this->TaxDeductionRepository->update($id, $request->validated());
        return $this->successResponse(new TaxDeductionResource($data), 'TaxDeduction updated successfully');
    }

    public function destroy($id)
    {
        $this->TaxDeductionRepository->delete($id);
        return $this->successResponse(null, 'TaxDeduction deleted successfully');
    }
}
