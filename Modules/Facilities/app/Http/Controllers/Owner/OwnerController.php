<?php

namespace Modules\Facilities\Http\Controllers\Owner;

use Modules\Facilities\Repositories\Owner\OwnerRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;
use Modules\Facilities\Http\Requests\Owner\OwnerStoreRequest;
use Modules\Facilities\Http\Requests\Owner\OwnerUpdateRequest;
use Modules\Facilities\Transformers\Owner\OwnerResource;
use Modules\Facilities\Transformers\Owner\OwnerResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;


class OwnerController extends Controller
{
    use ApiResponseTrait;
 
    protected $OwnerRepository;

    public function __construct(OwnerRepositoryInterface $OwnerRepository)
    {
        $this->OwnerRepository = $OwnerRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new OwnerResourceEnums([]),'Owner enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->OwnerRepository->all(), 'owner', OwnerResource::class),
         'Owner list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->OwnerRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Owner not found', 404);
        }
        return $this->successResponse(new OwnerResource($data), 'Owner retrieved successfully');
    }

    public function store(OwnerStoreRequest $request)
    {
        $validated = $request->validated();
        $record = $this->OwnerRepository->create($validated);
        return $this->successResponse(new OwnerResource($record), 'Owner created successfully', 201);
    }

    public function update(OwnerUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $record = $this->OwnerRepository->update($id, $validated);
        return $this->successResponse(new OwnerResource($record), 'Owner updated successfully');
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

        $deletedCount = $this->OwnerRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} Owner deleted successfully");
    }
}
