<?php

namespace Modules\CmsErp\Http\Controllers\SalaryType;

use Modules\CmsErp\Repositories\SalaryType\SalaryTypeRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\SalaryType\SalaryTypeStoreRequest;
use Modules\CmsErp\Http\Requests\SalaryType\SalaryTypeUpdateRequest;
use Modules\CmsErp\Transformers\SalaryType\SalaryTypeResource;

class SalaryTypeController extends Controller
{
    use ApiResponseTrait;

    protected $SalaryTypeRepository;

    public function __construct(SalaryTypeRepositoryInterface $SalaryTypeRepository)
    {
        $this->SalaryTypeRepository = $SalaryTypeRepository;
    }

    public function index()
    {
        $data = $this->SalaryTypeRepository->all();
        return $this->successResponse(SalaryTypeResource::collection($data), 'SalaryType list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->SalaryTypeRepository->find($id);
        if (!$data) {
            return $this->errorResponse('SalaryType not found', 404);
        }
        return $this->successResponse(new SalaryTypeResource($data), 'SalaryType retrieved successfully');
    }

    public function store(SalaryTypeStoreRequest $request)
    {
        $data = $this->SalaryTypeRepository->create($request->validated());
        return $this->successResponse(new SalaryTypeResource($data), 'SalaryType created successfully', 201);
    }

    public function update(SalaryTypeUpdateRequest $request, $id)
    {
        $data = $this->SalaryTypeRepository->update($id, $request->validated());
        return $this->successResponse(new SalaryTypeResource($data), 'SalaryType updated successfully');
    }

    public function destroy($id)
    {
        $this->SalaryTypeRepository->delete($id);
        return $this->successResponse(null, 'SalaryType deleted successfully');
    }
}
