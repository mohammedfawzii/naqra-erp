<?php

namespace Modules\CmsErp\Http\Controllers\ActivitySpecific;

use Modules\CmsErp\Repositories\ActivitySpecific\ActivitySpecificRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\ActivitySpecific\ActivitySpecificStoreRequest;
use Modules\CmsErp\Http\Requests\ActivitySpecific\ActivitySpecificUpdateRequest;
use Modules\CmsErp\Transformers\ActivitySpecific\ActivitySpecificResource;

class ActivitySpecificController extends Controller
{
    use ApiResponseTrait;

    protected $ActivitySpecificRepository;

    public function __construct(ActivitySpecificRepositoryInterface $ActivitySpecificRepository)
    {
        $this->ActivitySpecificRepository = $ActivitySpecificRepository;
    }

    public function index()
    {
        $data = $this->ActivitySpecificRepository->all();
        return $this->successResponse(ActivitySpecificResource::collection($data), 'ActivitySpecific list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->ActivitySpecificRepository->find($id);
        if (!$data) {
            return $this->errorResponse('ActivitySpecific not found', 404);
        }
        return $this->successResponse(new ActivitySpecificResource($data), 'ActivitySpecific retrieved successfully');
    }

    public function store(ActivitySpecificStoreRequest $request)
    {
        $data = $this->ActivitySpecificRepository->create($request->validated());
        return $this->successResponse(new ActivitySpecificResource($data), 'ActivitySpecific created successfully', 201);
    }

    public function update(ActivitySpecificUpdateRequest $request, $id)
    {
        $data = $this->ActivitySpecificRepository->update($id, $request->validated());
        return $this->successResponse(new ActivitySpecificResource($data), 'ActivitySpecific updated successfully');
    }

    public function destroy($id)
    {
        $this->ActivitySpecificRepository->delete($id);
        return $this->successResponse(null, 'ActivitySpecific deleted successfully');
    }
}
