<?php

namespace Modules\Facilities\Http\Controllers\Facilities;

use Modules\Facilities\Repositories\Facilities\FacilitiesRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;
use Modules\Facilities\Http\Requests\Facilities\FacilitiesStoreRequest;
use Modules\Facilities\Http\Requests\Facilities\FacilitiesUpdateRequest;
use Modules\Facilities\Transformers\Facilities\FacilitiesResource;
use Modules\Facilities\Transformers\Facilities\FacilitiesResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;


class FacilitiesController extends Controller
{
    use ApiResponseTrait;
 
    protected $FacilitiesRepository;

    public function __construct(FacilitiesRepositoryInterface $FacilitiesRepository)
    {
        $this->FacilitiesRepository = $FacilitiesRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new FacilitiesResourceEnums([]),'Facilities enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->FacilitiesRepository->all(), 'facilities', FacilitiesResource::class),
         'Facilities list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->FacilitiesRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Facilities not found', 404);
        }
        return $this->successResponse(new FacilitiesResource($data), 'Facilities retrieved successfully');
    }

    public function store(FacilitiesStoreRequest $request )
    {
        $validated = $request->validated();
        $record = $this->FacilitiesRepository->create($validated);
        return $this->successResponse(new FacilitiesResource($record), 'Facilities created successfully', 201);
    }

    public function update(FacilitiesUpdateRequest $request, $id )
    {
        $validated = $request->validated();
        $record = $this->FacilitiesRepository->update($id, $validated);
        return $this->successResponse(new FacilitiesResource($record), 'Facilities updated successfully');
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
        $deletedCount = $this->FacilitiesRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} Facilities deleted successfully");
    }
}
