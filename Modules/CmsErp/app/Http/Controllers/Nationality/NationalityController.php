<?php

namespace Modules\CmsErp\Http\Controllers\Nationality;

use Modules\CmsErp\Repositories\Nationality\NationalityRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\Nationality\NationalityStoreRequest;
use Modules\CmsErp\Http\Requests\Nationality\NationalityUpdateRequest;
use Modules\CmsErp\Transformers\Nationality\NationalityResource;

class NationalityController extends Controller
{
    use ApiResponseTrait;

    protected $NationalityRepository;

    public function __construct(NationalityRepositoryInterface $NationalityRepository)
    {
        $this->NationalityRepository = $NationalityRepository;
    }

    public function index()
    {
        $data = $this->NationalityRepository->all();
        return $this->successResponse(NationalityResource::collection($data), 'Nationality list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->NationalityRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Nationality not found', 404);
        }
        return $this->successResponse(new NationalityResource($data), 'Nationality retrieved successfully');
    }

    public function store(NationalityStoreRequest $request)
    {
        $data = $this->NationalityRepository->create($request->validated());
        return $this->successResponse(new NationalityResource($data), 'Nationality created successfully', 201);
    }

    public function update(NationalityUpdateRequest $request, $id)
    {
        $data = $this->NationalityRepository->update($id, $request->validated());
        return $this->successResponse(new NationalityResource($data), 'Nationality updated successfully');
    }

    public function destroy($id)
    {
        $this->NationalityRepository->delete($id);
        return $this->successResponse(null, 'Nationality deleted successfully');
    }
}
