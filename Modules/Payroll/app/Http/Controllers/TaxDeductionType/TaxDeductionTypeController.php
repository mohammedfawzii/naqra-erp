<?php

namespace Modules\Payroll\Http\Controllers\TaxDeductionType;

use Modules\Payroll\Repositories\TaxDeductionType\TaxDeductionTypeRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\TaxDeductionType\TaxDeductionTypeStoreRequest;
use Modules\Payroll\Http\Requests\TaxDeductionType\TaxDeductionTypeUpdateRequest;
use Modules\Payroll\Transformers\TaxDeductionType\TaxDeductionTypeResource;

class TaxDeductionTypeController extends Controller
{
    use ApiResponseTrait;

    protected $TaxDeductionTypeRepository;

    public function __construct(TaxDeductionTypeRepositoryInterface $TaxDeductionTypeRepository)
    {
        $this->TaxDeductionTypeRepository = $TaxDeductionTypeRepository;
    }

    public function index()
    {
        $data = $this->TaxDeductionTypeRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'taxdeductiontype', TaxDeductionTypeResource::class),
                    'TaxDeductionType list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->TaxDeductionTypeRepository->find($id);
        if (!$data) {
            return $this->errorResponse('TaxDeductionType not found', 404);
        }
        return $this->successResponse(new TaxDeductionTypeResource($data), 'TaxDeductionType retrieved successfully');
    }

    public function store(TaxDeductionTypeStoreRequest $request)
    {
        $data = $this->TaxDeductionTypeRepository->create($request->validated());
        return $this->successResponse(new TaxDeductionTypeResource($data), 'TaxDeductionType created successfully', 201);
    }

    public function update(TaxDeductionTypeUpdateRequest $request, $id)
    {
        $data = $this->TaxDeductionTypeRepository->update($id, $request->validated());
        return $this->successResponse(new TaxDeductionTypeResource($data), 'TaxDeductionType updated successfully');
    }

    public function destroy($id)
    {
        $this->TaxDeductionTypeRepository->delete($id);
        return $this->successResponse(null, 'TaxDeductionType deleted successfully');
    }
}
