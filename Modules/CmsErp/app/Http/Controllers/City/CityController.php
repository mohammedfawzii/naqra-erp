<?php

namespace Modules\CmsErp\Http\Controllers\City;

use Modules\CmsErp\Repositories\City\CityRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\City\CityStoreRequest;
use Modules\CmsErp\Http\Requests\City\CityUpdateRequest;
use Modules\CmsErp\Transformers\City\CityResource;

class CityController extends Controller
{
    use ApiResponseTrait;

    protected $CityRepository;

    public function __construct(CityRepositoryInterface $CityRepository)
    {
        $this->CityRepository = $CityRepository;
    }

    public function index()
    {
        $data = $this->CityRepository->all();
        return $this->successResponse(CityResource::collection($data), 'City list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->CityRepository->find($id);
        if (!$data) {
            return $this->errorResponse('City not found', 404);
        }
        return $this->successResponse(new CityResource($data), 'City retrieved successfully');
    }

    public function store(CityStoreRequest $request)
    {
        $data = $this->CityRepository->create($request->validated());
        return $this->successResponse(new CityResource($data), 'City created successfully', 201);
    }

    public function update(CityUpdateRequest $request, $id)
    {
        $data = $this->CityRepository->update($id, $request->validated());
        return $this->successResponse(new CityResource($data), 'City updated successfully');
    }

    public function destroy($id)
    {
        $this->CityRepository->delete($id);
        return $this->successResponse(null, 'City deleted successfully');
    }
}
