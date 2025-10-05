<?php

namespace Modules\CmsErp\Http\Controllers\BloodType;

use Modules\CmsErp\Repositories\BloodType\BloodTypeRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\BloodType\BloodTypeStoreRequest;
use Modules\CmsErp\Http\Requests\BloodType\BloodTypeUpdateRequest;
use Modules\CmsErp\Transformers\BloodType\BloodTypeResource;

class BloodTypeController extends Controller
{
    use ApiResponseTrait;

    protected $BloodTypeRepository;

    public function __construct(BloodTypeRepositoryInterface $BloodTypeRepository)
    {
        $this->BloodTypeRepository = $BloodTypeRepository;
    }

    public function index()
    {
        $data = $this->BloodTypeRepository->all();
        return $this->successResponse(BloodTypeResource::collection($data), 'BloodType list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->BloodTypeRepository->find($id);
        if (!$data) {
            return $this->errorResponse('BloodType not found', 404);
        }
        return $this->successResponse(new BloodTypeResource($data), 'BloodType retrieved successfully');
    }

    public function store(BloodTypeStoreRequest $request)
    {
        $data = $this->BloodTypeRepository->create($request->validated());
        return $this->successResponse(new BloodTypeResource($data), 'BloodType created successfully', 201);
    }

    public function update(BloodTypeUpdateRequest $request, $id)
    {
        $data = $this->BloodTypeRepository->update($id, $request->validated());
        return $this->successResponse(new BloodTypeResource($data), 'BloodType updated successfully');
    }

    public function destroy($id)
    {
        $this->BloodTypeRepository->delete($id);
        return $this->successResponse(null, 'BloodType deleted successfully');
    }
}
