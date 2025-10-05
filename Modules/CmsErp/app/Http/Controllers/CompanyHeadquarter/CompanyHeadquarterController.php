<?php

namespace Modules\CmsErp\Http\Controllers\CompanyHeadquarter;

use Modules\CmsErp\Repositories\CompanyHeadquarter\CompanyHeadquarterRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\CompanyHeadquarter\CompanyHeadquarterStoreRequest;
use Modules\CmsErp\Http\Requests\CompanyHeadquarter\CompanyHeadquarterUpdateRequest;
use Modules\CmsErp\Transformers\CompanyHeadquarter\CompanyHeadquarterResource;

class CompanyHeadquarterController extends Controller
{
    use ApiResponseTrait;

    protected $CompanyHeadquarterRepository;

    public function __construct(CompanyHeadquarterRepositoryInterface $CompanyHeadquarterRepository)
    {
        $this->CompanyHeadquarterRepository = $CompanyHeadquarterRepository;
    }

    public function index()
    {
        $data = $this->CompanyHeadquarterRepository->all();
        return $this->successResponse(CompanyHeadquarterResource::collection($data), 'CompanyHeadquarter list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->CompanyHeadquarterRepository->find($id);
        if (!$data) {
            return $this->errorResponse('CompanyHeadquarter not found', 404);
        }
        return $this->successResponse(new CompanyHeadquarterResource($data), 'CompanyHeadquarter retrieved successfully');
    }

    public function store(CompanyHeadquarterStoreRequest $request)
    {
        $data = $this->CompanyHeadquarterRepository->create($request->validated());
        return $this->successResponse(new CompanyHeadquarterResource($data), 'CompanyHeadquarter created successfully', 201);
    }

    public function update(CompanyHeadquarterUpdateRequest $request, $id)
    {
        $data = $this->CompanyHeadquarterRepository->update($id, $request->validated());
        return $this->successResponse(new CompanyHeadquarterResource($data), 'CompanyHeadquarter updated successfully');
    }

    public function destroy($id)
    {
        $this->CompanyHeadquarterRepository->delete($id);
        return $this->successResponse(null, 'CompanyHeadquarter deleted successfully');
    }
}
