<?php

namespace Modules\Payroll\Http\Controllers\IncentiveType;

use Modules\Payroll\Repositories\IncentiveType\IncentiveTypeRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\IncentiveType\IncentiveTypeStoreRequest;
use Modules\Payroll\Http\Requests\IncentiveType\IncentiveTypeUpdateRequest;
use Modules\Payroll\Transformers\IncentiveType\IncentiveTypeResource;

class IncentiveTypeController extends Controller
{
    use ApiResponseTrait;

    protected $IncentiveTypeRepository;

    public function __construct(IncentiveTypeRepositoryInterface $IncentiveTypeRepository)
    {
        $this->IncentiveTypeRepository = $IncentiveTypeRepository;
    }

    public function index()
    {
        $data = $this->IncentiveTypeRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'incentivetype', IncentiveTypeResource::class),
                    'IncentiveType list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->IncentiveTypeRepository->find($id);
        if (!$data) {
            return $this->errorResponse('IncentiveType not found', 404);
        }
        return $this->successResponse(new IncentiveTypeResource($data), 'IncentiveType retrieved successfully');
    }

    public function store(IncentiveTypeStoreRequest $request)
    {
        $data = $this->IncentiveTypeRepository->create($request->validated());
        return $this->successResponse(new IncentiveTypeResource($data), 'IncentiveType created successfully', 201);
    }

    public function update(IncentiveTypeUpdateRequest $request, $id)
    {
        $data = $this->IncentiveTypeRepository->update($id, $request->validated());
        return $this->successResponse(new IncentiveTypeResource($data), 'IncentiveType updated successfully');
    }

    public function destroy($id)
    {
        $this->IncentiveTypeRepository->delete($id);
        return $this->successResponse(null, 'IncentiveType deleted successfully');
    }
}
