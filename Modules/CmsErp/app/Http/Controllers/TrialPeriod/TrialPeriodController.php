<?php

namespace Modules\CmsErp\Http\Controllers\TrialPeriod;

use Modules\CmsErp\Repositories\TrialPeriod\TrialPeriodRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\TrialPeriod\TrialPeriodStoreRequest;
use Modules\CmsErp\Http\Requests\TrialPeriod\TrialPeriodUpdateRequest;
use Modules\CmsErp\Transformers\TrialPeriod\TrialPeriodResource;

class TrialPeriodController extends Controller
{
    use ApiResponseTrait;

    protected $TrialPeriodRepository;

    public function __construct(TrialPeriodRepositoryInterface $TrialPeriodRepository)
    {
        $this->TrialPeriodRepository = $TrialPeriodRepository;
    }

    public function index()
    {
        $data = $this->TrialPeriodRepository->all();
        return $this->successResponse(TrialPeriodResource::collection($data), 'TrialPeriod list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->TrialPeriodRepository->find($id);
        if (!$data) {
            return $this->errorResponse('TrialPeriod not found', 404);
        }
        return $this->successResponse(new TrialPeriodResource($data), 'TrialPeriod retrieved successfully');
    }

    public function store(TrialPeriodStoreRequest $request)
    {
        $data = $this->TrialPeriodRepository->create($request->validated());
        return $this->successResponse(new TrialPeriodResource($data), 'TrialPeriod created successfully', 201);
    }

    public function update(TrialPeriodUpdateRequest $request, $id)
    {
        $data = $this->TrialPeriodRepository->update($id, $request->validated());
        return $this->successResponse(new TrialPeriodResource($data), 'TrialPeriod updated successfully');
    }

    public function destroy($id)
    {
        $this->TrialPeriodRepository->delete($id);
        return $this->successResponse(null, 'TrialPeriod deleted successfully');
    }
}
