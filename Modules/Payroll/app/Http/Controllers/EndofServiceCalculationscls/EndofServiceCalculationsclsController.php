<?php

namespace Modules\Payroll\Http\Controllers\EndofServiceCalculationscls;

use Modules\Payroll\Repositories\EndofServiceCalculationscls\EndofServiceCalculationsclsRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\EndofServiceCalculationscls\EndofServiceCalculationsclsStoreRequest;
use Modules\Payroll\Http\Requests\EndofServiceCalculationscls\EndofServiceCalculationsclsUpdateRequest;
use Modules\Payroll\Transformers\EndofServiceCalculationscls\EndofServiceCalculationsclsResource;

class EndofServiceCalculationsclsController extends Controller
{
    use ApiResponseTrait;

    protected $EndofServiceCalculationsclsRepository;

    public function __construct(EndofServiceCalculationsclsRepositoryInterface $EndofServiceCalculationsclsRepository)
    {
        $this->EndofServiceCalculationsclsRepository = $EndofServiceCalculationsclsRepository;
    }

    public function index()
    {
        $data = $this->EndofServiceCalculationsclsRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'endofservicecalculationscls', EndofServiceCalculationsclsResource::class),
                    'EndofServiceCalculationscls list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->EndofServiceCalculationsclsRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EndofServiceCalculationscls not found', 404);
        }
        return $this->successResponse(new EndofServiceCalculationsclsResource($data), 'EndofServiceCalculationscls retrieved successfully');
    }

    public function store(EndofServiceCalculationsclsStoreRequest $request)
    {
        $data = $this->EndofServiceCalculationsclsRepository->create($request->validated());
        return $this->successResponse(new EndofServiceCalculationsclsResource($data), 'EndofServiceCalculationscls created successfully', 201);
    }

    public function update(EndofServiceCalculationsclsUpdateRequest $request, $id)
    {
        $data = $this->EndofServiceCalculationsclsRepository->update($id, $request->validated());
        return $this->successResponse(new EndofServiceCalculationsclsResource($data), 'EndofServiceCalculationscls updated successfully');
    }

    public function destroy($id)
    {
        $this->EndofServiceCalculationsclsRepository->delete($id);
        return $this->successResponse(null, 'EndofServiceCalculationscls deleted successfully');
    }
}
