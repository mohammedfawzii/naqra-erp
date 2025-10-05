<?php

namespace Modules\CmsErp\Http\Controllers\OwnershipType;

use Modules\CmsErp\Repositories\OwnershipType\OwnershipTypeRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\OwnershipType\OwnershipTypeStoreRequest;
use Modules\CmsErp\Http\Requests\OwnershipType\OwnershipTypeUpdateRequest;
use Modules\CmsErp\Transformers\OwnershipType\OwnershipTypeResource;

class OwnershipTypeController extends Controller
{
    use ApiResponseTrait;

    protected $OwnershipTypeRepository;

    public function __construct(OwnershipTypeRepositoryInterface $OwnershipTypeRepository)
    {
        $this->OwnershipTypeRepository = $OwnershipTypeRepository;
    }

    public function index()
    {
        $data = $this->OwnershipTypeRepository->all();
        return $this->successResponse(OwnershipTypeResource::collection($data), 'OwnershipType list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->OwnershipTypeRepository->find($id);
        if (!$data) {
            return $this->errorResponse('OwnershipType not found', 404);
        }
        return $this->successResponse(new OwnershipTypeResource($data), 'OwnershipType retrieved successfully');
    }

    public function store(OwnershipTypeStoreRequest $request)
    {
        $data = $this->OwnershipTypeRepository->create($request->validated());
        return $this->successResponse(new OwnershipTypeResource($data), 'OwnershipType created successfully', 201);
    }

    public function update(OwnershipTypeUpdateRequest $request, $id)
    {
        $data = $this->OwnershipTypeRepository->update($id, $request->validated());
        return $this->successResponse(new OwnershipTypeResource($data), 'OwnershipType updated successfully');
    }

    public function destroy($id)
    {
        $this->OwnershipTypeRepository->delete($id);
        return $this->successResponse(null, 'OwnershipType deleted successfully');
    }
}
