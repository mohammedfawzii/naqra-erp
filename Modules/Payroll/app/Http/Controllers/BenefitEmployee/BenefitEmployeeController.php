<?php

namespace Modules\Payroll\Http\Controllers\BenefitEmployee;

use Modules\Payroll\Repositories\BenefitEmployee\BenefitEmployeeRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\BenefitEmployee\BenefitEmployeeStoreRequest;
use Modules\Payroll\Http\Requests\BenefitEmployee\BenefitEmployeeUpdateRequest;
use Modules\Payroll\Transformers\BenefitEmployee\BenefitEmployeeResource;

class BenefitEmployeeController extends Controller
{
    use ApiResponseTrait;

    protected $BenefitEmployeeRepository;

    public function __construct(BenefitEmployeeRepositoryInterface $BenefitEmployeeRepository)
    {
        $this->BenefitEmployeeRepository = $BenefitEmployeeRepository;
    }

    public function index()
    {
        $data = $this->BenefitEmployeeRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'benefitemployee', BenefitEmployeeResource::class),
                    'BenefitEmployee list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->BenefitEmployeeRepository->find($id);
        if (!$data) {
            return $this->errorResponse('BenefitEmployee not found', 404);
        }
        return $this->successResponse(new BenefitEmployeeResource($data), 'BenefitEmployee retrieved successfully');
    }

    public function store(BenefitEmployeeStoreRequest $request)
    {
        $data = $this->BenefitEmployeeRepository->create($request->validated());
        return $this->successResponse(new BenefitEmployeeResource($data), 'BenefitEmployee created successfully', 201);
    }

    public function update(BenefitEmployeeUpdateRequest $request, $id)
    {
        $data = $this->BenefitEmployeeRepository->update($id, $request->validated());
        return $this->successResponse(new BenefitEmployeeResource($data), 'BenefitEmployee updated successfully');
    }

    public function destroy($id)
    {
        $this->BenefitEmployeeRepository->delete($id);
        return $this->successResponse(null, 'BenefitEmployee deleted successfully');
    }
}
