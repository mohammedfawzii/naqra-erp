<?php

namespace Modules\CmsErp\Http\Controllers\ActivityPrivate;

use Modules\CmsErp\Repositories\ActivityPrivate\ActivityPrivateRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\ActivityPrivate\ActivityPrivateStoreRequest;
use Modules\CmsErp\Http\Requests\ActivityPrivate\ActivityPrivateUpdateRequest;
use Modules\CmsErp\Transformers\ActivityPrivate\ActivityPrivateResource;

class ActivityPrivateController extends Controller
{
    use ApiResponseTrait;

    protected $ActivityPrivateRepository;

    public function __construct(ActivityPrivateRepositoryInterface $ActivityPrivateRepository)
    {
        $this->ActivityPrivateRepository = $ActivityPrivateRepository;
    }

    public function index()
    {
        $data = $this->ActivityPrivateRepository->all();
        return $this->successResponse(ActivityPrivateResource::collection($data), 'ActivityPrivate list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->ActivityPrivateRepository->find($id);
        if (!$data) {
            return $this->errorResponse('ActivityPrivate not found', 404);
        }
        return $this->successResponse(new ActivityPrivateResource($data), 'ActivityPrivate retrieved successfully');
    }

    public function store(ActivityPrivateStoreRequest $request)
    {
        $data = $this->ActivityPrivateRepository->create($request->validated());
        return $this->successResponse(new ActivityPrivateResource($data), 'ActivityPrivate created successfully', 201);
    }

    public function update(ActivityPrivateUpdateRequest $request, $id)
    {
        $data = $this->ActivityPrivateRepository->update($id, $request->validated());
        return $this->successResponse(new ActivityPrivateResource($data), 'ActivityPrivate updated successfully');
    }

    public function destroy($id)
    {
        $this->ActivityPrivateRepository->delete($id);
        return $this->successResponse(null, 'ActivityPrivate deleted successfully');
    }
}
