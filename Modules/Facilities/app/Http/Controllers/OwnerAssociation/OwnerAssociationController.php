<?php

namespace Modules\Facilities\Http\Controllers\OwnerAssociation;

use Modules\Facilities\Repositories\OwnerAssociation\OwnerAssociationRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;
use Modules\Facilities\Http\Requests\OwnerAssociation\OwnerAssociationStoreRequest;
use Modules\Facilities\Http\Requests\OwnerAssociation\OwnerAssociationUpdateRequest;
use Modules\Facilities\Transformers\OwnerAssociation\OwnerAssociationResource;
use Modules\Facilities\Transformers\OwnerAssociation\OwnerAssociationResourceEnums;
 use Modules\Facilities\Services\CompleteFacilityService;

class OwnerAssociationController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'associations';

 
    public function __construct(
        protected OwnerAssociationRepositoryInterface $OwnerAssociationRepository,
        protected CompleteFacilityService $completionService
)
    {
     }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new OwnerAssociationResourceEnums([]),'OwnerAssociation enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->OwnerAssociationRepository->all(), 'ownerassociation', OwnerAssociationResource::class),
         'OwnerAssociation list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->OwnerAssociationRepository->find($id);
        if (!$data) {
            return $this->errorResponse('OwnerAssociation not found', 404);
        }
        return $this->successResponse(new OwnerAssociationResource($data), 'OwnerAssociation retrieved successfully');
    }

    public function store(OwnerAssociationStoreRequest $request)
    {
        $validated = $request->validated();
        $record = $this->OwnerAssociationRepository->create($validated);
        $this->completionService->syncCompletion($validated, $request, $this->pageName);

        return $this->successResponse(new OwnerAssociationResource($record), 'OwnerAssociation created successfully', 201);
    }

    public function update(OwnerAssociationUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $record = $this->OwnerAssociationRepository->update($id, $validated);
        $this->completionService->syncCompletion($validated, $request, $this->pageName);


        return $this->successResponse(new OwnerAssociationResource($record), 'OwnerAssociation updated successfully');
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

        $deletedCount = $this->OwnerAssociationRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} OwnerAssociation deleted successfully");
    }
}
