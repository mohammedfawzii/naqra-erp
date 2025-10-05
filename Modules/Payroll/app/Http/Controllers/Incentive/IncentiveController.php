<?php

namespace Modules\Payroll\Http\Controllers\Incentive;

use Modules\Payroll\Repositories\Incentive\IncentiveRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\Incentive\IncentiveStoreRequest;
use Modules\Payroll\Http\Requests\Incentive\IncentiveUpdateRequest;
use Modules\Payroll\Transformers\Incentive\IncentiveResource;

class IncentiveController extends Controller
{
    use ApiResponseTrait;

    protected $IncentiveRepository;

    public function __construct(IncentiveRepositoryInterface $IncentiveRepository)
    {
        $this->IncentiveRepository = $IncentiveRepository;
    }

    public function index()
    {
        $data = $this->IncentiveRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'incentive', IncentiveResource::class),
                    'Incentive list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->IncentiveRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Incentive not found', 404);
        }
        return $this->successResponse(new IncentiveResource($data), 'Incentive retrieved successfully');
    }

    public function store(IncentiveStoreRequest $request)
    {
        $data = $this->IncentiveRepository->create($request->validated());
        return $this->successResponse(new IncentiveResource($data), 'Incentive created successfully', 201);
    }

    public function update(IncentiveUpdateRequest $request, $id)
    {
        $data = $this->IncentiveRepository->update($id, $request->validated());
        return $this->successResponse(new IncentiveResource($data), 'Incentive updated successfully');
    }

    public function destroy($id)
    {
        $this->IncentiveRepository->delete($id);
        return $this->successResponse(null, 'Incentive deleted successfully');
    }
}
