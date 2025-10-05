<?php

namespace Modules\CmsErp\Http\Controllers\ActivityGeneral;

use Modules\CmsErp\Repositories\ActivityGeneral\ActivityGeneralRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\ActivityGeneral\ActivityGeneralStoreRequest;
use Modules\CmsErp\Http\Requests\ActivityGeneral\ActivityGeneralUpdateRequest;
use Modules\CmsErp\Transformers\ActivityGeneral\ActivityGeneralResource;

class ActivityGeneralController extends Controller
{
    use ApiResponseTrait;

    protected $ActivityGeneralRepository;

    public function __construct(ActivityGeneralRepositoryInterface $ActivityGeneralRepository)
    {
        $this->ActivityGeneralRepository = $ActivityGeneralRepository;
    }

    public function index()
    {
        $data = $this->ActivityGeneralRepository->all();
        return $this->successResponse(ActivityGeneralResource::collection($data), 'ActivityGeneral list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->ActivityGeneralRepository->find($id);
        if (!$data) {
            return $this->errorResponse('ActivityGeneral not found', 404);
        }
        return $this->successResponse(new ActivityGeneralResource($data), 'ActivityGeneral retrieved successfully');
    }

    public function store(ActivityGeneralStoreRequest $request)
    {
        $data = $this->ActivityGeneralRepository->create($request->validated());
        return $this->successResponse(new ActivityGeneralResource($data), 'ActivityGeneral created successfully', 201);
    }

    public function update(ActivityGeneralUpdateRequest $request, $id)
    {
        $data = $this->ActivityGeneralRepository->update($id, $request->validated());
        return $this->successResponse(new ActivityGeneralResource($data), 'ActivityGeneral updated successfully');
    }

    public function destroy($id)
    {
        $this->ActivityGeneralRepository->delete($id);
        return $this->successResponse(null, 'ActivityGeneral deleted successfully');
    }
}
