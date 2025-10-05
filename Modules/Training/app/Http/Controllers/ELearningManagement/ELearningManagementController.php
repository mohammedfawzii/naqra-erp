<?php

namespace Modules\Training\Http\Controllers\ELearningManagement;

use Modules\Training\Repositories\ELearningManagement\ELearningManagementRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Training\Transformers\BaseCollection\BaseCollection;
use Modules\Training\Http\Requests\ELearningManagement\ELearningManagementStoreRequest;
use Modules\Training\Http\Requests\ELearningManagement\ELearningManagementUpdateRequest;
use Modules\Training\Transformers\ELearningManagement\ELearningManagementResource;
use Modules\Training\Transformers\ELearningManagement\ELearningManagementResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class ELearningManagementController extends Controller
{
    use ApiResponseTrait;

    protected $ELearningManagementRepository;

    public function __construct(ELearningManagementRepositoryInterface $ELearningManagementRepository)
    {
        $this->ELearningManagementRepository = $ELearningManagementRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new ELearningManagementResourceEnums([]),'ELearningManagement enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->ELearningManagementRepository->all(), 'elearningmanagement', ELearningManagementResource::class),
         'ELearningManagement list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->ELearningManagementRepository->find($id);
        if (!$data) {
            return $this->errorResponse('ELearningManagement not found', 404);
        }
        return $this->successResponse(new ELearningManagementResource($data), 'ELearningManagement retrieved successfully');
    }

    public function store(ELearningManagementStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->ELearningManagementRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new ELearningManagementResource($record), 'ELearningManagement created successfully', 201);
    }

    public function update(ELearningManagementUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->ELearningManagementRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new ELearningManagementResource($record), 'ELearningManagement updated successfully');
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

        $deletedCount = $this->ELearningManagementRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} ELearningManagement deleted successfully");
    }
}
