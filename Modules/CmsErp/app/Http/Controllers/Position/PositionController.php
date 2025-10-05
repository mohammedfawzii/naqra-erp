<?php

namespace Modules\CmsErp\Http\Controllers\Position;

use Modules\CmsErp\Repositories\Position\PositionRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\Position\PositionStoreRequest;
use Modules\CmsErp\Http\Requests\Position\PositionUpdateRequest;
use Modules\CmsErp\Transformers\Position\PositionResource;

class PositionController extends Controller
{
    use ApiResponseTrait;

    protected $PositionRepository;

    public function __construct(PositionRepositoryInterface $PositionRepository)
    {
        $this->PositionRepository = $PositionRepository;
    }

    public function index()
    {
        $data = $this->PositionRepository->all();
        return $this->successResponse(PositionResource::collection($data), 'Position list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->PositionRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Position not found', 404);
        }
        return $this->successResponse(new PositionResource($data), 'Position retrieved successfully');
    }

    public function store(PositionStoreRequest $request)
    {
        $data = $this->PositionRepository->create($request->validated());
        return $this->successResponse(new PositionResource($data), 'Position created successfully', 201);
    }

    public function update(PositionUpdateRequest $request, $id)
    {
        $data = $this->PositionRepository->update($id, $request->validated());
        return $this->successResponse(new PositionResource($data), 'Position updated successfully');
    }

    public function destroy($id)
    {
        $this->PositionRepository->delete($id);
        return $this->successResponse(null, 'Position deleted successfully');
    }
}
