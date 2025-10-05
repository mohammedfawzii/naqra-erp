<?php

namespace Modules\CmsErp\Http\Controllers\Relationship;

use Modules\CmsErp\Repositories\Relationship\RelationshipRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\Relationship\RelationshipStoreRequest;
use Modules\CmsErp\Http\Requests\Relationship\RelationshipUpdateRequest;
use Modules\CmsErp\Transformers\Relationship\RelationshipResource;

class RelationshipController extends Controller
{
    use ApiResponseTrait;

    protected $RelationshipRepository;

    public function __construct(RelationshipRepositoryInterface $RelationshipRepository)
    {
        $this->RelationshipRepository = $RelationshipRepository;
    }

    public function index()
    {
        $data = $this->RelationshipRepository->all();
        return $this->successResponse(RelationshipResource::collection($data), 'Relationship list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->RelationshipRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Relationship not found', 404);
        }
        return $this->successResponse(new RelationshipResource($data), 'Relationship retrieved successfully');
    }

    public function store(RelationshipStoreRequest $request)
    {
        $data = $this->RelationshipRepository->create($request->validated());
        return $this->successResponse(new RelationshipResource($data), 'Relationship created successfully', 201);
    }

    public function update(RelationshipUpdateRequest $request, $id)
    {
        $data = $this->RelationshipRepository->update($id, $request->validated());
        return $this->successResponse(new RelationshipResource($data), 'Relationship updated successfully');
    }

    public function destroy($id)
    {
        $this->RelationshipRepository->delete($id);
        return $this->successResponse(null, 'Relationship deleted successfully');
    }
}
