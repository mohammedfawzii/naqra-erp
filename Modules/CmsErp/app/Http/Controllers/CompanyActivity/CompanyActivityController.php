<?php

namespace Modules\CmsErp\Http\Controllers\CompanyActivity;

use Modules\CmsErp\Repositories\CompanyActivity\CompanyActivityRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\CompanyActivity\CompanyActivityStoreRequest;
use Modules\CmsErp\Http\Requests\CompanyActivity\CompanyActivityUpdateRequest;
use Modules\CmsErp\Transformers\CompanyActivity\CompanyActivityResource;

class CompanyActivityController extends Controller
{
    use ApiResponseTrait;

    protected $CompanyActivityRepository;

    public function __construct(CompanyActivityRepositoryInterface $CompanyActivityRepository)
    {
        $this->CompanyActivityRepository = $CompanyActivityRepository;
    }

    public function index()
    {
        $data = $this->CompanyActivityRepository->all();
        return $this->successResponse(CompanyActivityResource::collection($data), 'CompanyActivity list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->CompanyActivityRepository->find($id);
        if (!$data) {
            return $this->errorResponse('CompanyActivity not found', 404);
        }
        return $this->successResponse(new CompanyActivityResource($data), 'CompanyActivity retrieved successfully');
    }

    public function store(CompanyActivityStoreRequest $request)
    {
        $data = $this->CompanyActivityRepository->create($request->validated());
        return $this->successResponse(new CompanyActivityResource($data), 'CompanyActivity created successfully', 201);
    }

    public function update(CompanyActivityUpdateRequest $request, $id)
    {
        $data = $this->CompanyActivityRepository->update($id, $request->validated());
        return $this->successResponse(new CompanyActivityResource($data), 'CompanyActivity updated successfully');
    }

    public function destroy($id)
    {
        $this->CompanyActivityRepository->delete($id);
        return $this->successResponse(null, 'CompanyActivity deleted successfully');
    }
}
