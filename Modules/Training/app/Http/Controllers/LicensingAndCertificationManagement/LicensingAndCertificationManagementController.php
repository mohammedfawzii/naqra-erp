<?php

namespace Modules\Training\Http\Controllers\LicensingAndCertificationManagement;

use Modules\Training\Repositories\LicensingAndCertificationManagement\LicensingAndCertificationManagementRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Training\Transformers\BaseCollection\BaseCollection;
use Modules\Training\Http\Requests\LicensingAndCertificationManagement\LicensingAndCertificationManagementStoreRequest;
use Modules\Training\Http\Requests\LicensingAndCertificationManagement\LicensingAndCertificationManagementUpdateRequest;
use Modules\Training\Transformers\LicensingAndCertificationManagement\LicensingAndCertificationManagementResource;
use Modules\Training\Transformers\LicensingAndCertificationManagement\LicensingAndCertificationManagementResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class LicensingAndCertificationManagementController extends Controller
{
    use ApiResponseTrait;

    protected $LicensingAndCertificationManagementRepository;

    public function __construct(LicensingAndCertificationManagementRepositoryInterface $LicensingAndCertificationManagementRepository)
    {
        $this->LicensingAndCertificationManagementRepository = $LicensingAndCertificationManagementRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new LicensingAndCertificationManagementResourceEnums([]),'LicensingAndCertificationManagement enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->LicensingAndCertificationManagementRepository->all(), 'licensingandcertificationmanagement', LicensingAndCertificationManagementResource::class),
         'LicensingAndCertificationManagement list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->LicensingAndCertificationManagementRepository->find($id);
        if (!$data) {
            return $this->errorResponse('LicensingAndCertificationManagement not found', 404);
        }
        return $this->successResponse(new LicensingAndCertificationManagementResource($data), 'LicensingAndCertificationManagement retrieved successfully');
    }

    public function store(LicensingAndCertificationManagementStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->LicensingAndCertificationManagementRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new LicensingAndCertificationManagementResource($record), 'LicensingAndCertificationManagement created successfully', 201);
    }

    public function update(LicensingAndCertificationManagementUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->LicensingAndCertificationManagementRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new LicensingAndCertificationManagementResource($record), 'LicensingAndCertificationManagement updated successfully');
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

        $deletedCount = $this->LicensingAndCertificationManagementRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} LicensingAndCertificationManagement deleted successfully");
    }
}
