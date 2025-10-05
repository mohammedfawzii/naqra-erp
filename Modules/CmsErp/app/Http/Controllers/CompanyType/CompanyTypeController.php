<?php

namespace Modules\CmsErp\Http\Controllers\CompanyType;

use Modules\CmsErp\Repositories\CompanyType\CompanyTypeRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\CompanyType\CompanyTypeStoreRequest;
use Modules\CmsErp\Http\Requests\CompanyType\CompanyTypeUpdateRequest;
use Modules\CmsErp\Transformers\CompanyType\CompanyTypeResource;

class CompanyTypeController extends Controller
{
    use ApiResponseTrait;

    protected $CompanyTypeRepository;

    public function __construct(CompanyTypeRepositoryInterface $CompanyTypeRepository)
    {
        $this->CompanyTypeRepository = $CompanyTypeRepository;
    }

    public function index()
    {
        $data = $this->CompanyTypeRepository->all();
        return $this->successResponse(CompanyTypeResource::collection($data), 'CompanyType list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->CompanyTypeRepository->find($id);
        if (!$data) {
            return $this->errorResponse('CompanyType not found', 404);
        }
        return $this->successResponse(new CompanyTypeResource($data), 'CompanyType retrieved successfully');
    }

    public function store(CompanyTypeStoreRequest $request)
    {
        $data = $this->CompanyTypeRepository->create($request->validated());
        return $this->successResponse(new CompanyTypeResource($data), 'CompanyType created successfully', 201);
    }

    public function update(CompanyTypeUpdateRequest $request, $id)
    {
        $data = $this->CompanyTypeRepository->update($id, $request->validated());
        return $this->successResponse(new CompanyTypeResource($data), 'CompanyType updated successfully');
    }

    public function destroy($id)
    {
        $this->CompanyTypeRepository->delete($id);
        return $this->successResponse(null, 'CompanyType deleted successfully');
    }
}
