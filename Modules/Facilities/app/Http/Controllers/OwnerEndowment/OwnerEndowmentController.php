<?php

namespace Modules\Facilities\Http\Controllers\OwnerEndowment;

use Modules\Facilities\Repositories\OwnerEndowment\OwnerEndowmentRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;
use Modules\Facilities\Http\Requests\OwnerEndowment\OwnerEndowmentStoreRequest;
use Modules\Facilities\Http\Requests\OwnerEndowment\OwnerEndowmentUpdateRequest;
use Modules\Facilities\Transformers\OwnerEndowment\OwnerEndowmentResource;
use Modules\Facilities\Transformers\OwnerEndowment\OwnerEndowmentResourceEnums;
   use Modules\Facilities\Services\CompleteFacilityService;


class OwnerEndowmentController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'endowments';

 
    public function __construct(
        protected OwnerEndowmentRepositoryInterface $OwnerEndowmentRepository,
        protected CompleteFacilityService $completionService

        )
    {
     }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new OwnerEndowmentResourceEnums([]),'OwnerEndowment enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->OwnerEndowmentRepository->all(), 'ownerendowment', OwnerEndowmentResource::class),
         'OwnerEndowment list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->OwnerEndowmentRepository->find($id);
        if (!$data) {
            return $this->errorResponse('OwnerEndowment not found', 404);
        }
        return $this->successResponse(new OwnerEndowmentResource($data), 'OwnerEndowment retrieved successfully');
    }

    public function store(OwnerEndowmentStoreRequest $request)
    {
        $validated = $request->validated();
        $record = $this->OwnerEndowmentRepository->create($validated);
        $this->completionService->syncCompletion($validated, $request, $this->pageName);
        return $this->successResponse(new OwnerEndowmentResource($record), 'OwnerEndowment created successfully', 201);
    }

    public function update(OwnerEndowmentUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $record = $this->OwnerEndowmentRepository->update($id, $validated);
        $this->completionService->syncCompletion($validated, $request, $this->pageName);
        return $this->successResponse(new OwnerEndowmentResource($record), 'OwnerEndowment updated successfully');
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

        $deletedCount = $this->OwnerEndowmentRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} OwnerEndowment deleted successfully");
    }
}
