<?php

namespace Modules\Performance\Http\Controllers\ContinuousPerformanceManagement;

use Modules\Performance\Repositories\ContinuousPerformanceManagement\ContinuousPerformanceManagementRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Performance\Transformers\BaseCollection\BaseCollection;
use Modules\Performance\Http\Requests\ContinuousPerformanceManagement\ContinuousPerformanceManagementStoreRequest;
use Modules\Performance\Http\Requests\ContinuousPerformanceManagement\ContinuousPerformanceManagementUpdateRequest;
use Modules\Performance\Transformers\ContinuousPerformanceManagement\ContinuousPerformanceManagementResource;
use Modules\Performance\Transformers\ContinuousPerformanceManagement\ContinuousPerformanceManagementResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class ContinuousPerformanceManagementController extends Controller
{
    use ApiResponseTrait;

    protected $ContinuousPerformanceManagementRepository;

    public function __construct(ContinuousPerformanceManagementRepositoryInterface $ContinuousPerformanceManagementRepository)
    {
        $this->ContinuousPerformanceManagementRepository = $ContinuousPerformanceManagementRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new ContinuousPerformanceManagementResourceEnums([]),'ContinuousPerformanceManagement enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->ContinuousPerformanceManagementRepository->all(), 'continuousperformancemanagement', ContinuousPerformanceManagementResource::class),
         'ContinuousPerformanceManagement list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->ContinuousPerformanceManagementRepository->find($id);
        if (!$data) {
            return $this->errorResponse('ContinuousPerformanceManagement not found', 404);
        }
        return $this->successResponse(new ContinuousPerformanceManagementResource($data), 'ContinuousPerformanceManagement retrieved successfully');
    }

    public function store(ContinuousPerformanceManagementStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->ContinuousPerformanceManagementRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new ContinuousPerformanceManagementResource($record), 'ContinuousPerformanceManagement created successfully', 201);
    }

    public function update(ContinuousPerformanceManagementUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->ContinuousPerformanceManagementRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new ContinuousPerformanceManagementResource($record), 'ContinuousPerformanceManagement updated successfully');
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

        $deletedCount = $this->ContinuousPerformanceManagementRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} ContinuousPerformanceManagement deleted successfully");
    }
}
