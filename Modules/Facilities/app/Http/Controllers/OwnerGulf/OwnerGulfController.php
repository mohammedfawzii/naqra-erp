<?php

namespace Modules\Facilities\Http\Controllers\OwnerGulf;

use Modules\Facilities\Repositories\OwnerGulf\OwnerGulfRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;
use Modules\Facilities\Http\Requests\OwnerGulf\OwnerGulfStoreRequest;
use Modules\Facilities\Http\Requests\OwnerGulf\OwnerGulfUpdateRequest;
use Modules\Facilities\Transformers\OwnerGulf\OwnerGulfResource;
use Modules\Facilities\Transformers\OwnerGulf\OwnerGulfResourceEnums;
  use Modules\Facilities\Services\CompleteFacilityService;


class OwnerGulfController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'gulfs';

 
    public function __construct(
        protected OwnerGulfRepositoryInterface $OwnerGulfRepository,
        protected CompleteFacilityService $completionService)
    {
     }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new OwnerGulfResourceEnums([]),'OwnerGulf enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->OwnerGulfRepository->all(), 'ownergulf', OwnerGulfResource::class),
         'OwnerGulf list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->OwnerGulfRepository->find($id);
        if (!$data) {
            return $this->errorResponse('OwnerGulf not found', 404);
        }
        return $this->successResponse(new OwnerGulfResource($data), 'OwnerGulf retrieved successfully');
    }

    public function store(OwnerGulfStoreRequest $request)
    {
        $validated = $request->validated();
        $record = $this->OwnerGulfRepository->create($validated);
        $this->completionService->syncCompletion($validated, $request, $this->pageName);
        return $this->successResponse(new OwnerGulfResource($record), 'OwnerGulf created successfully', 201);
    }

    public function update(OwnerGulfUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $record = $this->OwnerGulfRepository->update($id, $validated);
        $this->completionService->syncCompletion($validated, $request, $this->pageName);
        return $this->successResponse(new OwnerGulfResource($record), 'OwnerGulf updated successfully');
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

        $deletedCount = $this->OwnerGulfRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} OwnerGulf deleted successfully");
    }
}
