<?php

namespace Modules\Performance\Http\Controllers\AiDrivenPerformanceInsight;

use Modules\Performance\Repositories\AiDrivenPerformanceInsight\AiDrivenPerformanceInsightRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Performance\Transformers\BaseCollection\BaseCollection;
use Modules\Performance\Http\Requests\AiDrivenPerformanceInsight\AiDrivenPerformanceInsightStoreRequest;
use Modules\Performance\Http\Requests\AiDrivenPerformanceInsight\AiDrivenPerformanceInsightUpdateRequest;
use Modules\Performance\Transformers\AiDrivenPerformanceInsight\AiDrivenPerformanceInsightResource;
use Modules\Performance\Transformers\AiDrivenPerformanceInsight\AiDrivenPerformanceInsightResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class AiDrivenPerformanceInsightController extends Controller
{
    use ApiResponseTrait;

    protected $AiDrivenPerformanceInsightRepository;

    public function __construct(AiDrivenPerformanceInsightRepositoryInterface $AiDrivenPerformanceInsightRepository)
    {
        $this->AiDrivenPerformanceInsightRepository = $AiDrivenPerformanceInsightRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new AiDrivenPerformanceInsightResourceEnums([]),'AiDrivenPerformanceInsight enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->AiDrivenPerformanceInsightRepository->all(), 'aidrivenperformanceinsight', AiDrivenPerformanceInsightResource::class),
         'AiDrivenPerformanceInsight list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->AiDrivenPerformanceInsightRepository->find($id);
        if (!$data) {
            return $this->errorResponse('AiDrivenPerformanceInsight not found', 404);
        }
        return $this->successResponse(new AiDrivenPerformanceInsightResource($data), 'AiDrivenPerformanceInsight retrieved successfully');
    }

    public function store(AiDrivenPerformanceInsightStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->AiDrivenPerformanceInsightRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new AiDrivenPerformanceInsightResource($record), 'AiDrivenPerformanceInsight created successfully', 201);
    }

    public function update(AiDrivenPerformanceInsightUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->AiDrivenPerformanceInsightRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new AiDrivenPerformanceInsightResource($record), 'AiDrivenPerformanceInsight updated successfully');
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

        $deletedCount = $this->AiDrivenPerformanceInsightRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} AiDrivenPerformanceInsight deleted successfully");
    }
}
