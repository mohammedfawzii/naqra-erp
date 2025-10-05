<?php

namespace Modules\CmsErp\Http\Controllers\NoticePeriod;

use Modules\CmsErp\Repositories\NoticePeriod\NoticePeriodRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\NoticePeriod\NoticePeriodStoreRequest;
use Modules\CmsErp\Http\Requests\NoticePeriod\NoticePeriodUpdateRequest;
use Modules\CmsErp\Transformers\NoticePeriod\NoticePeriodResource;

class NoticePeriodController extends Controller
{
    use ApiResponseTrait;

    protected $NoticePeriodRepository;

    public function __construct(NoticePeriodRepositoryInterface $NoticePeriodRepository)
    {
        $this->NoticePeriodRepository = $NoticePeriodRepository;
    }

    public function index()
    {
        $data = $this->NoticePeriodRepository->all();
        return $this->successResponse(NoticePeriodResource::collection($data), 'NoticePeriod list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->NoticePeriodRepository->find($id);
        if (!$data) {
            return $this->errorResponse('NoticePeriod not found', 404);
        }
        return $this->successResponse(new NoticePeriodResource($data), 'NoticePeriod retrieved successfully');
    }

    public function store(NoticePeriodStoreRequest $request)
    {
        $data = $this->NoticePeriodRepository->create($request->validated());
        return $this->successResponse(new NoticePeriodResource($data), 'NoticePeriod created successfully', 201);
    }

    public function update(NoticePeriodUpdateRequest $request, $id)
    {
        $data = $this->NoticePeriodRepository->update($id, $request->validated());
        return $this->successResponse(new NoticePeriodResource($data), 'NoticePeriod updated successfully');
    }

    public function destroy($id)
    {
        $this->NoticePeriodRepository->delete($id);
        return $this->successResponse(null, 'NoticePeriod deleted successfully');
    }
}
