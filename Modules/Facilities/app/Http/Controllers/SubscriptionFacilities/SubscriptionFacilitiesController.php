<?php

namespace Modules\Facilities\Http\Controllers\SubscriptionFacilities;

use Modules\Facilities\Repositories\SubscriptionFacilities\SubscriptionFacilitiesRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;
use Modules\Facilities\Http\Requests\SubscriptionFacilities\SubscriptionFacilitiesStoreRequest;
use Modules\Facilities\Http\Requests\SubscriptionFacilities\SubscriptionFacilitiesUpdateRequest;
use Modules\Facilities\Transformers\SubscriptionFacilities\SubscriptionFacilitiesResource;
use Modules\Facilities\Transformers\SubscriptionFacilities\SubscriptionFacilitiesResourceEnums;
use App\Services\AttachmentService\AttachmentService;
   use Modules\Facilities\Services\CompleteFacilityService;

class SubscriptionFacilitiesController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'subscription';

 
    public function __construct(protected SubscriptionFacilitiesRepositoryInterface $SubscriptionFacilitiesRepository,
     protected  AttachmentService $attachmentService,
        protected CompleteFacilityService $completionService
    )
    {
     }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new SubscriptionFacilitiesResourceEnums([]),'SubscriptionFacilities enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->SubscriptionFacilitiesRepository->all(), 'subscriptionfacilities', SubscriptionFacilitiesResource::class),
         'SubscriptionFacilities list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->SubscriptionFacilitiesRepository->find($id);
        if (!$data) {
            return $this->errorResponse('SubscriptionFacilities not found', 404);
        }
        return $this->successResponse(new SubscriptionFacilitiesResource($data), 'SubscriptionFacilities retrieved successfully');
    }

    public function store(SubscriptionFacilitiesStoreRequest $request)
    {
        $validated = $request->validated();
        $files = $validated['files'] ?? null;
        unset($validated['files']);
        $record = $this->SubscriptionFacilitiesRepository->create($validated);
        $this->attachmentService->uploadFiles($files, $record, 'facilities');
        $this->completionService->syncCompletion($validated, $request, $this->pageName);
        return $this->successResponse(new SubscriptionFacilitiesResource($record), 'SubscriptionFacilities created successfully', 201);
    }

    public function update(SubscriptionFacilitiesUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $files = $validated['files'] ?? null;
        unset($validated['files']);
        $record = $this->SubscriptionFacilitiesRepository->update($id, $validated);
        $this->attachmentService->uploadFiles($files, $record, 'facilities');
        $this->completionService->syncCompletion($validated, $request, $this->pageName);

        return $this->successResponse(new SubscriptionFacilitiesResource($record), 'SubscriptionFacilities updated successfully');
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

        $deletedCount = $this->SubscriptionFacilitiesRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} SubscriptionFacilities deleted successfully");
    }
}
