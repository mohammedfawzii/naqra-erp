<?php

namespace Modules\Facilities\Http\Controllers\OwnerResident;

use Modules\Facilities\Repositories\OwnerResident\OwnerResidentRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;
use Modules\Facilities\Http\Requests\OwnerResident\OwnerResidentStoreRequest;
use Modules\Facilities\Http\Requests\OwnerResident\OwnerResidentUpdateRequest;
use Modules\Facilities\Transformers\OwnerResident\OwnerResidentResource;
use Modules\Facilities\Transformers\OwnerResident\OwnerResidentResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;
  use Modules\Facilities\Services\CompleteFacilityService;


class OwnerResidentController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'residents';

 
    public function __construct(protected OwnerResidentRepositoryInterface $OwnerResidentRepository,
    protected CompleteFacilityService $completionService,
    )
    {
     }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new OwnerResidentResourceEnums([]),'OwnerResident enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->OwnerResidentRepository->all(), 'ownerresident', OwnerResidentResource::class),
         'OwnerResident list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->OwnerResidentRepository->find($id);
        if (!$data) {
            return $this->errorResponse('OwnerResident not found', 404);
        }
        return $this->successResponse(new OwnerResidentResource($data), 'OwnerResident retrieved successfully');
    }

    public function store(OwnerResidentStoreRequest $request)
    {
        $validated = $request->validated();
        $record = $this->OwnerResidentRepository->create($validated);
        $this->completionService->syncCompletion($validated, $request, $this->pageName);

        return $this->successResponse(new OwnerResidentResource($record), 'OwnerResident created successfully', 201);
    }

    public function update(OwnerResidentUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $record = $this->OwnerResidentRepository->update($id, $validated);
        $this->completionService->syncCompletion($validated, $request, $this->pageName);

        return $this->successResponse(new OwnerResidentResource($record), 'OwnerResident updated successfully');
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

        $deletedCount = $this->OwnerResidentRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} OwnerResident deleted successfully");
    }
}
