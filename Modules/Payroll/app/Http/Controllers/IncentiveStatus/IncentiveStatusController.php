<?php

namespace Modules\Payroll\Http\Controllers\IncentiveStatus;

use Modules\Payroll\Repositories\IncentiveStatus\IncentiveStatusRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\IncentiveStatus\IncentiveStatusStoreRequest;
use Modules\Payroll\Http\Requests\IncentiveStatus\IncentiveStatusUpdateRequest;
use Modules\Payroll\Transformers\IncentiveStatus\IncentiveStatusResource;

class IncentiveStatusController extends Controller
{
    use ApiResponseTrait;

    protected $IncentiveStatusRepository;

    public function __construct(IncentiveStatusRepositoryInterface $IncentiveStatusRepository)
    {
        $this->IncentiveStatusRepository = $IncentiveStatusRepository;
    }

    public function index()
    {
        $data = $this->IncentiveStatusRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'incentivestatus', IncentiveStatusResource::class),
                    'IncentiveStatus list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->IncentiveStatusRepository->find($id);
        if (!$data) {
            return $this->errorResponse('IncentiveStatus not found', 404);
        }
        return $this->successResponse(new IncentiveStatusResource($data), 'IncentiveStatus retrieved successfully');
    }

    public function store(IncentiveStatusStoreRequest $request)
    {
        $data = $this->IncentiveStatusRepository->create($request->validated());
        return $this->successResponse(new IncentiveStatusResource($data), 'IncentiveStatus created successfully', 201);
    }

    public function update(IncentiveStatusUpdateRequest $request, $id)
    {
        $data = $this->IncentiveStatusRepository->update($id, $request->validated());
        return $this->successResponse(new IncentiveStatusResource($data), 'IncentiveStatus updated successfully');
    }

    public function destroy($id)
    {
        $this->IncentiveStatusRepository->delete($id);
        return $this->successResponse(null, 'IncentiveStatus deleted successfully');
    }
}
