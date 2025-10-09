<?php

namespace Modules\Facilities\Http\Controllers\OwnerGulfCompany;

use Modules\Facilities\Repositories\OwnerGulfCompany\OwnerGulfCompanyRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;
use Modules\Facilities\Http\Requests\OwnerGulfCompany\OwnerGulfCompanyStoreRequest;
use Modules\Facilities\Http\Requests\OwnerGulfCompany\OwnerGulfCompanyUpdateRequest;
use Modules\Facilities\Transformers\OwnerGulfCompany\OwnerGulfCompanyResource;
use Modules\Facilities\Transformers\OwnerGulfCompany\OwnerGulfCompanyResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;
  use Modules\Facilities\Services\CompleteFacilityService;


class OwnerGulfCompanyController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'gulf-companies';

 
    public function __construct(
        protected OwnerGulfCompanyRepositoryInterface $OwnerGulfCompanyRepository,
        protected CompleteFacilityService $completionService)

        
    {
     }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new OwnerGulfCompanyResourceEnums([]),'OwnerGulfCompany enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->OwnerGulfCompanyRepository->all(), 'ownergulfcompany', OwnerGulfCompanyResource::class),
         'OwnerGulfCompany list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->OwnerGulfCompanyRepository->find($id);
        if (!$data) {
            return $this->errorResponse('OwnerGulfCompany not found', 404);
        }
        return $this->successResponse(new OwnerGulfCompanyResource($data), 'OwnerGulfCompany retrieved successfully');
    }

    public function store(OwnerGulfCompanyStoreRequest $request)
    {
        $validated = $request->validated();
        $record = $this->OwnerGulfCompanyRepository->create($validated);
        $this->completionService->syncCompletion($validated, $request, $this->pageName);
        return $this->successResponse(new OwnerGulfCompanyResource($record), 'OwnerGulfCompany created successfully', 201);
    }

    public function update(OwnerGulfCompanyUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $record = $this->OwnerGulfCompanyRepository->update($id, $validated);
        $this->completionService->syncCompletion($validated, $request, $this->pageName);
        return $this->successResponse(new OwnerGulfCompanyResource($record), 'OwnerGulfCompany updated successfully');
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

        $deletedCount = $this->OwnerGulfCompanyRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} OwnerGulfCompany deleted successfully");
    }
}
