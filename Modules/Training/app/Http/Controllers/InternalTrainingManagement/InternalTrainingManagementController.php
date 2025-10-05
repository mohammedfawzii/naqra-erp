<?php

namespace Modules\Training\Http\Controllers\InternalTrainingManagement;

use Modules\Training\Repositories\InternalTrainingManagement\InternalTrainingManagementRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Training\Transformers\BaseCollection\BaseCollection;
use Modules\Training\Http\Requests\InternalTrainingManagement\InternalTrainingManagementStoreRequest;
use Modules\Training\Http\Requests\InternalTrainingManagement\InternalTrainingManagementUpdateRequest;
use Modules\Training\Transformers\InternalTrainingManagement\InternalTrainingManagementResource;
use Modules\Training\Transformers\InternalTrainingManagement\InternalTrainingManagementResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class InternalTrainingManagementController extends Controller
{
    use ApiResponseTrait;

    protected $InternalTrainingManagementRepository;

    public function __construct(InternalTrainingManagementRepositoryInterface $InternalTrainingManagementRepository)
    {
        $this->InternalTrainingManagementRepository = $InternalTrainingManagementRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new InternalTrainingManagementResourceEnums([]),'InternalTrainingManagement enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->InternalTrainingManagementRepository->all(), 'internaltrainingmanagement', InternalTrainingManagementResource::class),
         'InternalTrainingManagement list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->InternalTrainingManagementRepository->find($id);
        if (!$data) {
            return $this->errorResponse('InternalTrainingManagement not found', 404);
        }
        return $this->successResponse(new InternalTrainingManagementResource($data), 'InternalTrainingManagement retrieved successfully');
    }

    public function store(InternalTrainingManagementStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->InternalTrainingManagementRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new InternalTrainingManagementResource($record), 'InternalTrainingManagement created successfully', 201);
    }

    public function update(InternalTrainingManagementUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->InternalTrainingManagementRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new InternalTrainingManagementResource($record), 'InternalTrainingManagement updated successfully');
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

        $deletedCount = $this->InternalTrainingManagementRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} InternalTrainingManagement deleted successfully");
    }
}
