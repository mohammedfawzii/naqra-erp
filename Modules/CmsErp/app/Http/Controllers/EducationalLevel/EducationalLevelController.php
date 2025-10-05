<?php

namespace Modules\CmsErp\Http\Controllers\EducationalLevel;

use Modules\CmsErp\Repositories\EducationalLevel\EducationalLevelRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\EducationalLevel\EducationalLevelStoreRequest;
use Modules\CmsErp\Http\Requests\EducationalLevel\EducationalLevelUpdateRequest;
use Modules\CmsErp\Transformers\EducationalLevel\EducationalLevelResource;

class EducationalLevelController extends Controller
{
    use ApiResponseTrait;

    protected $EducationalLevelRepository;

    public function __construct(EducationalLevelRepositoryInterface $EducationalLevelRepository)
    {
        $this->EducationalLevelRepository = $EducationalLevelRepository;
    }

    public function index()
    {
        $data = $this->EducationalLevelRepository->all();
        return $this->successResponse(EducationalLevelResource::collection($data), 'EducationalLevel list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->EducationalLevelRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EducationalLevel not found', 404);
        }
        return $this->successResponse(new EducationalLevelResource($data), 'EducationalLevel retrieved successfully');
    }

    public function store(EducationalLevelStoreRequest $request)
    {
        $data = $this->EducationalLevelRepository->create($request->validated());
        return $this->successResponse(new EducationalLevelResource($data), 'EducationalLevel created successfully', 201);
    }

    public function update(EducationalLevelUpdateRequest $request, $id)
    {
        $data = $this->EducationalLevelRepository->update($id, $request->validated());
        return $this->successResponse(new EducationalLevelResource($data), 'EducationalLevel updated successfully');
    }

    public function destroy($id)
    {
        $this->EducationalLevelRepository->delete($id);
        return $this->successResponse(null, 'EducationalLevel deleted successfully');
    }
}
