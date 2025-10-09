<?php

namespace Modules\Facilities\Http\Controllers\PeriodicObligations;

use Modules\Facilities\Repositories\PeriodicObligations\PeriodicObligationsRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;
use Modules\Facilities\Http\Requests\PeriodicObligations\PeriodicObligationsStoreRequest;
use Modules\Facilities\Http\Requests\PeriodicObligations\PeriodicObligationsUpdateRequest;
use Modules\Facilities\Transformers\PeriodicObligations\PeriodicObligationsResource;
use Modules\Facilities\Transformers\PeriodicObligations\PeriodicObligationsResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;
use Modules\Facilities\Services\CompleteFacilityService;


class PeriodicObligationsController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'periodic-obligations';

 
    public function __construct(
        protected PeriodicObligationsRepositoryInterface $PeriodicObligationsRepository,
        protected CompleteFacilityService $completionService,
             protected  AttachmentService $attachmentService,
){}

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new PeriodicObligationsResourceEnums([]),'PeriodicObligations enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->PeriodicObligationsRepository->all(), 'periodicobligations', PeriodicObligationsResource::class),
         'PeriodicObligations list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->PeriodicObligationsRepository->find($id);
        if (!$data) {
            return $this->errorResponse('PeriodicObligations not found', 404);
        }
        return $this->successResponse(new PeriodicObligationsResource($data), 'PeriodicObligations retrieved successfully');
    }

    public function store(PeriodicObligationsStoreRequest $request)
    {
        $validated = $request->validated();
        $files = $validated['files'] ?? null;
        unset($validated['files']);
        $record = $this->PeriodicObligationsRepository->create($validated);
        $this->attachmentService->uploadFiles($files, $record, 'facilities');
        $this->completionService->syncCompletion($validated, $request, $this->pageName);

        return $this->successResponse(new PeriodicObligationsResource($record), 'PeriodicObligations created successfully', 201);
    }

    public function update(PeriodicObligationsUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $files = $validated['files'] ?? null;
        unset($validated['files']);
        $record = $this->PeriodicObligationsRepository->update($id, $validated);
        $this->attachmentService->uploadFiles($files, $record, 'facilities');
        $this->completionService->syncCompletion($validated, $request, $this->pageName);

        return $this->successResponse(new PeriodicObligationsResource($record), 'PeriodicObligations updated successfully');
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

        $deletedCount = $this->PeriodicObligationsRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} PeriodicObligations deleted successfully");
    }
}
