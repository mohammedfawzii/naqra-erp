<?php

namespace Modules\CmsErp\Http\Controllers\Religion;

use Modules\CmsErp\Repositories\Religion\ReligionRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\Religion\ReligionStoreRequest;
use Modules\CmsErp\Http\Requests\Religion\ReligionUpdateRequest;
use Modules\CmsErp\Transformers\Religion\ReligionResource;

class ReligionController extends Controller
{
    use ApiResponseTrait;

    protected $ReligionRepository;

    public function __construct(ReligionRepositoryInterface $ReligionRepository)
    {
        $this->ReligionRepository = $ReligionRepository;
    }

    public function index()
    {
        $data = $this->ReligionRepository->all();
        return $this->successResponse(ReligionResource::collection($data), 'Religion list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->ReligionRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Religion not found', 404);
        }
        return $this->successResponse(new ReligionResource($data), 'Religion retrieved successfully');
    }

    public function store(ReligionStoreRequest $request)
    {
        $data = $this->ReligionRepository->create($request->validated());
        return $this->successResponse(new ReligionResource($data), 'Religion created successfully', 201);
    }

    public function update(ReligionUpdateRequest $request, $id)
    {
        $data = $this->ReligionRepository->update($id, $request->validated());
        return $this->successResponse(new ReligionResource($data), 'Religion updated successfully');
    }

    public function destroy($id)
    {
        $this->ReligionRepository->delete($id);
        return $this->successResponse(null, 'Religion deleted successfully');
    }
}
