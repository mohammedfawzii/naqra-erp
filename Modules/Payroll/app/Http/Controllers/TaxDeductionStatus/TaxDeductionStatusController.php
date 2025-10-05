<?php

namespace Modules\Payroll\Http\Controllers\TaxDeductionStatus;

use Modules\Payroll\Repositories\TaxDeductionStatus\TaxDeductionStatusRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\TaxDeductionStatus\TaxDeductionStatusStoreRequest;
use Modules\Payroll\Http\Requests\TaxDeductionStatus\TaxDeductionStatusUpdateRequest;
use Modules\Payroll\Transformers\TaxDeductionStatus\TaxDeductionStatusResource;

class TaxDeductionStatusController extends Controller
{
    use ApiResponseTrait;

    protected $TaxDeductionStatusRepository;

    public function __construct(TaxDeductionStatusRepositoryInterface $TaxDeductionStatusRepository)
    {
        $this->TaxDeductionStatusRepository = $TaxDeductionStatusRepository;
    }

    public function index()
    {
        $data = $this->TaxDeductionStatusRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'taxdeductionstatus', TaxDeductionStatusResource::class),
                    'TaxDeductionStatus list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->TaxDeductionStatusRepository->find($id);
        if (!$data) {
            return $this->errorResponse('TaxDeductionStatus not found', 404);
        }
        return $this->successResponse(new TaxDeductionStatusResource($data), 'TaxDeductionStatus retrieved successfully');
    }

    public function store(TaxDeductionStatusStoreRequest $request)
    {
        $data = $this->TaxDeductionStatusRepository->create($request->validated());
        return $this->successResponse(new TaxDeductionStatusResource($data), 'TaxDeductionStatus created successfully', 201);
    }

    public function update(TaxDeductionStatusUpdateRequest $request, $id)
    {
        $data = $this->TaxDeductionStatusRepository->update($id, $request->validated());
        return $this->successResponse(new TaxDeductionStatusResource($data), 'TaxDeductionStatus updated successfully');
    }

    public function destroy($id)
    {
        $this->TaxDeductionStatusRepository->delete($id);
        return $this->successResponse(null, 'TaxDeductionStatus deleted successfully');
    }
}
