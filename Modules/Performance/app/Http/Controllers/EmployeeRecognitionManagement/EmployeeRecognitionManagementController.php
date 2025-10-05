<?php

namespace Modules\Performance\Http\Controllers\EmployeeRecognitionManagement;

use Modules\Performance\Repositories\EmployeeRecognitionManagement\EmployeeRecognitionManagementRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Performance\Transformers\BaseCollection\BaseCollection;
use Modules\Performance\Http\Requests\EmployeeRecognitionManagement\EmployeeRecognitionManagementStoreRequest;
use Modules\Performance\Http\Requests\EmployeeRecognitionManagement\EmployeeRecognitionManagementUpdateRequest;
use Modules\Performance\Transformers\EmployeeRecognitionManagement\EmployeeRecognitionManagementResource;
use Modules\Performance\Transformers\EmployeeRecognitionManagement\EmployeeRecognitionManagementResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class EmployeeRecognitionManagementController extends Controller
{
    use ApiResponseTrait;

    protected $EmployeeRecognitionManagementRepository;

    public function __construct(EmployeeRecognitionManagementRepositoryInterface $EmployeeRecognitionManagementRepository)
    {
        $this->EmployeeRecognitionManagementRepository = $EmployeeRecognitionManagementRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new EmployeeRecognitionManagementResourceEnums([]),'EmployeeRecognitionManagement enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->EmployeeRecognitionManagementRepository->all(), 'employeerecognitionmanagement', EmployeeRecognitionManagementResource::class),
         'EmployeeRecognitionManagement list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->EmployeeRecognitionManagementRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EmployeeRecognitionManagement not found', 404);
        }
        return $this->successResponse(new EmployeeRecognitionManagementResource($data), 'EmployeeRecognitionManagement retrieved successfully');
    }

    public function store(EmployeeRecognitionManagementStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->EmployeeRecognitionManagementRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new EmployeeRecognitionManagementResource($record), 'EmployeeRecognitionManagement created successfully', 201);
    }

    public function update(EmployeeRecognitionManagementUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->EmployeeRecognitionManagementRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new EmployeeRecognitionManagementResource($record), 'EmployeeRecognitionManagement updated successfully');
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

        $deletedCount = $this->EmployeeRecognitionManagementRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} EmployeeRecognitionManagement deleted successfully");
    }
}
