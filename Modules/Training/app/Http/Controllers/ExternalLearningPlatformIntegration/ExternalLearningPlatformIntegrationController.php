<?php

namespace Modules\Training\Http\Controllers\ExternalLearningPlatformIntegration;

use Modules\Training\Repositories\ExternalLearningPlatformIntegration\ExternalLearningPlatformIntegrationRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Training\Transformers\BaseCollection\BaseCollection;
use Modules\Training\Http\Requests\ExternalLearningPlatformIntegration\ExternalLearningPlatformIntegrationStoreRequest;
use Modules\Training\Http\Requests\ExternalLearningPlatformIntegration\ExternalLearningPlatformIntegrationUpdateRequest;
use Modules\Training\Transformers\ExternalLearningPlatformIntegration\ExternalLearningPlatformIntegrationResource;
use Modules\Training\Transformers\ExternalLearningPlatformIntegration\ExternalLearningPlatformIntegrationResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class ExternalLearningPlatformIntegrationController extends Controller
{
    use ApiResponseTrait;

    protected $ExternalLearningPlatformIntegrationRepository;

    public function __construct(ExternalLearningPlatformIntegrationRepositoryInterface $ExternalLearningPlatformIntegrationRepository)
    {
        $this->ExternalLearningPlatformIntegrationRepository = $ExternalLearningPlatformIntegrationRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new ExternalLearningPlatformIntegrationResourceEnums([]),'ExternalLearningPlatformIntegration enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->ExternalLearningPlatformIntegrationRepository->all(), 'externallearningplatformintegration', ExternalLearningPlatformIntegrationResource::class),
         'ExternalLearningPlatformIntegration list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->ExternalLearningPlatformIntegrationRepository->find($id);
        if (!$data) {
            return $this->errorResponse('ExternalLearningPlatformIntegration not found', 404);
        }
        return $this->successResponse(new ExternalLearningPlatformIntegrationResource($data), 'ExternalLearningPlatformIntegration retrieved successfully');
    }

    public function store(ExternalLearningPlatformIntegrationStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->ExternalLearningPlatformIntegrationRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new ExternalLearningPlatformIntegrationResource($record), 'ExternalLearningPlatformIntegration created successfully', 201);
    }

    public function update(ExternalLearningPlatformIntegrationUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->ExternalLearningPlatformIntegrationRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new ExternalLearningPlatformIntegrationResource($record), 'ExternalLearningPlatformIntegration updated successfully');
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

        $deletedCount = $this->ExternalLearningPlatformIntegrationRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} ExternalLearningPlatformIntegration deleted successfully");
    }
}
