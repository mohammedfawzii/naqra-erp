<?php

namespace Modules\CmsErp\Http\Controllers\MaritalStatus;

use Modules\CmsErp\Repositories\MaritalStatus\MaritalStatusRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\MaritalStatus\MaritalStatusStoreRequest;
use Modules\CmsErp\Http\Requests\MaritalStatus\MaritalStatusUpdateRequest;
use Modules\CmsErp\Transformers\MaritalStatus\MaritalStatusResource;

class MaritalStatusController extends Controller
{
    use ApiResponseTrait;

    protected $MaritalStatusRepository;

    public function __construct(MaritalStatusRepositoryInterface $MaritalStatusRepository)
    {
        $this->MaritalStatusRepository = $MaritalStatusRepository;
    }

    public function index()
    {
        $data = $this->MaritalStatusRepository->all();
        return $this->successResponse(MaritalStatusResource::collection($data), 'MaritalStatus list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->MaritalStatusRepository->find($id);
        if (!$data) {
            return $this->errorResponse('MaritalStatus not found', 404);
        }
        return $this->successResponse(new MaritalStatusResource($data), 'MaritalStatus retrieved successfully');
    }

    public function store(MaritalStatusStoreRequest $request)
    {
        $data = $this->MaritalStatusRepository->create($request->validated());
        return $this->successResponse(new MaritalStatusResource($data), 'MaritalStatus created successfully', 201);
    }

    public function update(MaritalStatusUpdateRequest $request, $id)
    {
        $data = $this->MaritalStatusRepository->update($id, $request->validated());
        return $this->successResponse(new MaritalStatusResource($data), 'MaritalStatus updated successfully');
    }

    public function destroy($id)
    {
        $this->MaritalStatusRepository->delete($id);
        return $this->successResponse(null, 'MaritalStatus deleted successfully');
    }
}
