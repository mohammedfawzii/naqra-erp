<?php

namespace Modules\Performance\Http\Controllers\CompetencyManagement;

use Modules\Performance\Repositories\CompetencyManagement\CompetencyManagementRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Performance\Transformers\BaseCollection\BaseCollection;
use Modules\Performance\Http\Requests\CompetencyManagement\CompetencyManagementStoreRequest;
use Modules\Performance\Http\Requests\CompetencyManagement\CompetencyManagementUpdateRequest;
use Modules\Performance\Transformers\CompetencyManagement\CompetencyManagementResource;
use Modules\Performance\Transformers\CompetencyManagement\CompetencyManagementResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class CompetencyManagementController extends Controller
{
    use ApiResponseTrait;

    protected $CompetencyManagementRepository;

    public function __construct(CompetencyManagementRepositoryInterface $CompetencyManagementRepository)
    {
        $this->CompetencyManagementRepository = $CompetencyManagementRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new CompetencyManagementResourceEnums([]),'CompetencyManagement enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->CompetencyManagementRepository->all(), 'competencymanagement', CompetencyManagementResource::class),
         'CompetencyManagement list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->CompetencyManagementRepository->find($id);
        if (!$data) {
            return $this->errorResponse('CompetencyManagement not found', 404);
        }
        return $this->successResponse(new CompetencyManagementResource($data), 'CompetencyManagement retrieved successfully');
    }

    public function store(CompetencyManagementStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->CompetencyManagementRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new CompetencyManagementResource($record), 'CompetencyManagement created successfully', 201);
    }

    public function update(CompetencyManagementUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->CompetencyManagementRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new CompetencyManagementResource($record), 'CompetencyManagement updated successfully');
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

        $deletedCount = $this->CompetencyManagementRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} CompetencyManagement deleted successfully");
    }
}
