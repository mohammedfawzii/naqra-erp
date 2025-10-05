<?php

namespace Modules\CmsErp\Http\Controllers\Ministry;

use Modules\CmsErp\Repositories\Ministry\MinistryRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\Ministry\MinistryStoreRequest;
use Modules\CmsErp\Http\Requests\Ministry\MinistryUpdateRequest;
use Modules\CmsErp\Transformers\Ministry\MinistryResource;

class MinistryController extends Controller
{
    use ApiResponseTrait;

    protected $MinistryRepository;

    public function __construct(MinistryRepositoryInterface $MinistryRepository)
    {
        $this->MinistryRepository = $MinistryRepository;
    }

    public function index()
    {
        $data = $this->MinistryRepository->all();
        return $this->successResponse(MinistryResource::collection($data), 'Ministry list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->MinistryRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Ministry not found', 404);
        }
        return $this->successResponse(new MinistryResource($data), 'Ministry retrieved successfully');
    }

    public function store(MinistryStoreRequest $request)
    {
        $data = $this->MinistryRepository->create($request->validated());
        return $this->successResponse(new MinistryResource($data), 'Ministry created successfully', 201);
    }

    public function update(MinistryUpdateRequest $request, $id)
    {
        $data = $this->MinistryRepository->update($id, $request->validated());
        return $this->successResponse(new MinistryResource($data), 'Ministry updated successfully');
    }

    public function destroy($id)
    {
        $this->MinistryRepository->delete($id);
        return $this->successResponse(null, 'Ministry deleted successfully');
    }
}
