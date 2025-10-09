<?php

namespace Modules\Facilities\Http\Controllers\DigitalFacility;

use Modules\Facilities\Repositories\DigitalFacility\DigitalFacilityRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;
use Modules\Facilities\Http\Requests\DigitalFacility\DigitalFacilityStoreRequest;
use Modules\Facilities\Http\Requests\DigitalFacility\DigitalFacilityUpdateRequest;
use Modules\Facilities\Transformers\DigitalFacility\DigitalFacilityResource;
use Modules\Facilities\Transformers\DigitalFacility\DigitalFacilityResourceEnums;
use App\Services\AttachmentService\AttachmentService;
  use Modules\Facilities\Services\CompleteFacilityService;


class DigitalFacilityController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'digital';

 
    public function __construct(
        protected DigitalFacilityRepositoryInterface $DigitalFacilityRepository,
        protected  AttachmentService $attachmentService,
        protected CompleteFacilityService $completionService
    )
    {
     }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new DigitalFacilityResourceEnums([]),'DigitalFacility enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->DigitalFacilityRepository->all(), 'digitalfacility', DigitalFacilityResource::class),
         'DigitalFacility list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->DigitalFacilityRepository->find($id);
        if (!$data) {
            return $this->errorResponse('DigitalFacility not found', 404);
        }
        return $this->successResponse(new DigitalFacilityResource($data), 'DigitalFacility retrieved successfully');
    }

    public function store(DigitalFacilityStoreRequest $request)
    {
        $validated = $request->validated();
        $files = $validated['files'] ?? null;
        unset($validated['files']);
        $model = $this->DigitalFacilityRepository->create($validated);
        $this->attachmentService->uploadFiles($files, $model, 'facilities');
        $this->completionService->syncCompletion($validated, $request, $this->pageName);
        return $this->successResponse(new DigitalFacilityResource($model), 'DigitalFacility created successfully', 201);
    }

    public function update(DigitalFacilityUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $files = $validated['files'] ?? null;
        unset($validated['files']);
        $model = $this->DigitalFacilityRepository->update($id, $validated);
        $this->attachmentService->uploadFiles($files, $model, 'facilities');
        $this->completionService->syncCompletion($validated, $request, $this->pageName);
        return $this->successResponse(new DigitalFacilityResource($model), 'DigitalFacility updated successfully');
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

        $deletedCount = $this->DigitalFacilityRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} DigitalFacility deleted successfully");
    }
}
