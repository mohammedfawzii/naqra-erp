<?php

namespace Modules\Facilities\Http\Controllers\OwnerForeignCompany;

use Modules\Facilities\Repositories\OwnerForeignCompany\OwnerForeignCompanyRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;
use Modules\Facilities\Http\Requests\OwnerForeignCompany\OwnerForeignCompanyStoreRequest;
use Modules\Facilities\Http\Requests\OwnerForeignCompany\OwnerForeignCompanyUpdateRequest;
use Modules\Facilities\Transformers\OwnerForeignCompany\OwnerForeignCompanyResource;
use Modules\Facilities\Transformers\OwnerForeignCompany\OwnerForeignCompanyResourceEnums;
use Modules\Facilities\Services\CompleteFacilityService;


class OwnerForeignCompanyController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'foreign-companies';

 
    public function __construct(
        protected OwnerForeignCompanyRepositoryInterface $OwnerForeignCompanyRepository,
        protected CompleteFacilityService $completionService

        )
    {
     }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new OwnerForeignCompanyResourceEnums([]),'OwnerForeignCompany enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->OwnerForeignCompanyRepository->all(), 'ownerforeigncompany', OwnerForeignCompanyResource::class),
         'OwnerForeignCompany list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->OwnerForeignCompanyRepository->find($id);
        if (!$data) {
            return $this->errorResponse('OwnerForeignCompany not found', 404);
        }
        return $this->successResponse(new OwnerForeignCompanyResource($data), 'OwnerForeignCompany retrieved successfully');
    }

    public function store(OwnerForeignCompanyStoreRequest $request)
    {
        $validated = $request->validated();
    
        $record = $this->OwnerForeignCompanyRepository->create($validated);
        $this->completionService->syncCompletion($validated, $request, $this->pageName);
        return $this->successResponse(new OwnerForeignCompanyResource($record), 'OwnerForeignCompany created successfully', 201);
    }

    public function update(OwnerForeignCompanyUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $record = $this->OwnerForeignCompanyRepository->update($id, $validated);
        $this->completionService->syncCompletion($validated, $request, $this->pageName);
        return $this->successResponse(new OwnerForeignCompanyResource($record), 'OwnerForeignCompany updated successfully');
    }

    public function destroy($id, Request $request)
    {
        $ids = $request->input('ids', []);

        if (is_string($ids)) {
            $ids = json_decode($ids, true);
        }

        if (!is_array($ids)) {
            return $this->errorResponse('IDs must be an array', 400);
        }

        $deletedCount = $this->OwnerForeignCompanyRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} OwnerForeignCompany deleted successfully");
    }
}
