<?php

namespace Modules\Performance\Http\Controllers\LearningManagementIntegration;

use Modules\Performance\Repositories\LearningManagementIntegration\LearningManagementIntegrationRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Performance\Transformers\BaseCollection\BaseCollection;
use Modules\Performance\Http\Requests\LearningManagementIntegration\LearningManagementIntegrationStoreRequest;
use Modules\Performance\Http\Requests\LearningManagementIntegration\LearningManagementIntegrationUpdateRequest;
use Modules\Performance\Transformers\LearningManagementIntegration\LearningManagementIntegrationResource;
use Modules\Performance\Transformers\LearningManagementIntegration\LearningManagementIntegrationResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class LearningManagementIntegrationController extends Controller
{
    use ApiResponseTrait;

    protected $LearningManagementIntegrationRepository;

    public function __construct(LearningManagementIntegrationRepositoryInterface $LearningManagementIntegrationRepository)
    {
        $this->LearningManagementIntegrationRepository = $LearningManagementIntegrationRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new LearningManagementIntegrationResourceEnums([]),'LearningManagementIntegration enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->LearningManagementIntegrationRepository->all(), 'learningmanagementintegration', LearningManagementIntegrationResource::class),
         'LearningManagementIntegration list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->LearningManagementIntegrationRepository->find($id);
        if (!$data) {
            return $this->errorResponse('LearningManagementIntegration not found', 404);
        }
        return $this->successResponse(new LearningManagementIntegrationResource($data), 'LearningManagementIntegration retrieved successfully');
    }

    public function store(LearningManagementIntegrationStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->LearningManagementIntegrationRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new LearningManagementIntegrationResource($record), 'LearningManagementIntegration created successfully', 201);
    }

    public function update(LearningManagementIntegrationUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->LearningManagementIntegrationRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new LearningManagementIntegrationResource($record), 'LearningManagementIntegration updated successfully');
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

        $deletedCount = $this->LearningManagementIntegrationRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} LearningManagementIntegration deleted successfully");
    }
}
