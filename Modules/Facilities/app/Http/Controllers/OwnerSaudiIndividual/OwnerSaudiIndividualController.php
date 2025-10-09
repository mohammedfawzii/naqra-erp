<?php

namespace Modules\Facilities\Http\Controllers\OwnerSaudiIndividual;

use Modules\Facilities\Repositories\OwnerSaudiIndividual\OwnerSaudiIndividualRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;
use Modules\Facilities\Http\Requests\OwnerSaudiIndividual\OwnerSaudiIndividualStoreRequest;
use Modules\Facilities\Http\Requests\OwnerSaudiIndividual\OwnerSaudiIndividualUpdateRequest;
use Modules\Facilities\Transformers\OwnerSaudiIndividual\OwnerSaudiIndividualResource;
use Modules\Facilities\Transformers\OwnerSaudiIndividual\OwnerSaudiIndividualResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;
use Modules\Facilities\Services\CompleteFacilityService;

class OwnerSaudiIndividualController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'saudi-individuals';

 
    public function __construct(
       protected OwnerSaudiIndividualRepositoryInterface $OwnerSaudiIndividualRepository,
        protected CompleteFacilityService $completionService)
    {
     }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new OwnerSaudiIndividualResourceEnums([]),'OwnerSaudiIndividual enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->OwnerSaudiIndividualRepository->all(), 'ownersaudiindividual', OwnerSaudiIndividualResource::class),
         'OwnerSaudiIndividual list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->OwnerSaudiIndividualRepository->find($id);
        if (!$data) {
            return $this->errorResponse('OwnerSaudiIndividual not found', 404);
        }
        return $this->successResponse(new OwnerSaudiIndividualResource($data), 'OwnerSaudiIndividual retrieved successfully');
    }

    public function store(OwnerSaudiIndividualStoreRequest $request)
    {
        $validated = $request->validated();
        $record = $this->OwnerSaudiIndividualRepository->create($validated);
        $this->completionService->syncCompletion($validated, $request, $this->pageName);
        return $this->successResponse(new OwnerSaudiIndividualResource($record), 'OwnerSaudiIndividual created successfully', 201);
    }

    public function update(OwnerSaudiIndividualUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $record = $this->OwnerSaudiIndividualRepository->update($id, $validated);
        $this->completionService->syncCompletion($validated, $request, $this->pageName);
        return $this->successResponse(new OwnerSaudiIndividualResource($record), 'OwnerSaudiIndividual updated successfully');
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

        $deletedCount = $this->OwnerSaudiIndividualRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} OwnerSaudiIndividual deleted successfully");
    }
}
