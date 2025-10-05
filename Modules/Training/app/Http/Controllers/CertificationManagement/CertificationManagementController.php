<?php

namespace Modules\Training\Http\Controllers\CertificationManagement;

use Modules\Training\Repositories\CertificationManagement\CertificationManagementRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Training\Transformers\BaseCollection\BaseCollection;
use Modules\Training\Http\Requests\CertificationManagement\CertificationManagementStoreRequest;
use Modules\Training\Http\Requests\CertificationManagement\CertificationManagementUpdateRequest;
use Modules\Training\Transformers\CertificationManagement\CertificationManagementResource;
use Modules\Training\Transformers\CertificationManagement\CertificationManagementResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class CertificationManagementController extends Controller
{
    use ApiResponseTrait;

    protected $CertificationManagementRepository;

    public function __construct(CertificationManagementRepositoryInterface $CertificationManagementRepository)
    {
        $this->CertificationManagementRepository = $CertificationManagementRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new CertificationManagementResourceEnums([]),'CertificationManagement enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->CertificationManagementRepository->all(), 'certificationmanagement', CertificationManagementResource::class),
         'CertificationManagement list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->CertificationManagementRepository->find($id);
        if (!$data) {
            return $this->errorResponse('CertificationManagement not found', 404);
        }
        return $this->successResponse(new CertificationManagementResource($data), 'CertificationManagement retrieved successfully');
    }

    public function store(CertificationManagementStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->CertificationManagementRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new CertificationManagementResource($record), 'CertificationManagement created successfully', 201);
    }

    public function update(CertificationManagementUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->CertificationManagementRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new CertificationManagementResource($record), 'CertificationManagement updated successfully');
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

        $deletedCount = $this->CertificationManagementRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} CertificationManagement deleted successfully");
    }
}
