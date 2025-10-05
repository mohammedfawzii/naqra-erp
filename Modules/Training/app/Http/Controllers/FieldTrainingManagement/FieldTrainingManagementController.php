<?php

namespace Modules\Training\Http\Controllers\FieldTrainingManagement;

use Modules\Training\Repositories\FieldTrainingManagement\FieldTrainingManagementRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Training\Transformers\BaseCollection\BaseCollection;
use Modules\Training\Http\Requests\FieldTrainingManagement\FieldTrainingManagementStoreRequest;
use Modules\Training\Http\Requests\FieldTrainingManagement\FieldTrainingManagementUpdateRequest;
use Modules\Training\Transformers\FieldTrainingManagement\FieldTrainingManagementResource;
use Modules\Training\Transformers\FieldTrainingManagement\FieldTrainingManagementResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class FieldTrainingManagementController extends Controller
{
    use ApiResponseTrait;

    protected $FieldTrainingManagementRepository;

    public function __construct(FieldTrainingManagementRepositoryInterface $FieldTrainingManagementRepository)
    {
        $this->FieldTrainingManagementRepository = $FieldTrainingManagementRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new FieldTrainingManagementResourceEnums([]),'FieldTrainingManagement enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->FieldTrainingManagementRepository->all(), 'fieldtrainingmanagement', FieldTrainingManagementResource::class),
         'FieldTrainingManagement list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->FieldTrainingManagementRepository->find($id);
        if (!$data) {
            return $this->errorResponse('FieldTrainingManagement not found', 404);
        }
        return $this->successResponse(new FieldTrainingManagementResource($data), 'FieldTrainingManagement retrieved successfully');
    }

    public function store(FieldTrainingManagementStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->FieldTrainingManagementRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new FieldTrainingManagementResource($record), 'FieldTrainingManagement created successfully', 201);
    }

    public function update(FieldTrainingManagementUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->FieldTrainingManagementRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new FieldTrainingManagementResource($record), 'FieldTrainingManagement updated successfully');
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

        $deletedCount = $this->FieldTrainingManagementRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} FieldTrainingManagement deleted successfully");
    }
}
