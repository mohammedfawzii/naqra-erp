<?php

namespace Modules\Payroll\Http\Controllers\BenefitType;

use Modules\Payroll\Repositories\BenefitType\BenefitTypeRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\BenefitType\BenefitTypeStoreRequest;
use Modules\Payroll\Http\Requests\BenefitType\BenefitTypeUpdateRequest;
use Modules\Payroll\Transformers\BenefitType\BenefitTypeResource;

class BenefitTypeController extends Controller
{
    use ApiResponseTrait;

    protected $BenefitTypeRepository;

    public function __construct(BenefitTypeRepositoryInterface $BenefitTypeRepository)
    {
        $this->BenefitTypeRepository = $BenefitTypeRepository;
    }

    public function index()
    {
        $data = $this->BenefitTypeRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'benefittype', BenefitTypeResource::class),
                    'BenefitType list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->BenefitTypeRepository->find($id);
        if (!$data) {
            return $this->errorResponse('BenefitType not found', 404);
        }
        return $this->successResponse(new BenefitTypeResource($data), 'BenefitType retrieved successfully');
    }

    public function store(BenefitTypeStoreRequest $request)
    {
        $data = $this->BenefitTypeRepository->create($request->validated());
        return $this->successResponse(new BenefitTypeResource($data), 'BenefitType created successfully', 201);
    }

    public function update(BenefitTypeUpdateRequest $request, $id)
    {
        $data = $this->BenefitTypeRepository->update($id, $request->validated());
        return $this->successResponse(new BenefitTypeResource($data), 'BenefitType updated successfully');
    }

    public function destroy($id)
    {
        $this->BenefitTypeRepository->delete($id);
        return $this->successResponse(null, 'BenefitType deleted successfully');
    }
}
