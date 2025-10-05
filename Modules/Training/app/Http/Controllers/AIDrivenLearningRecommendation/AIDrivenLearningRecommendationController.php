<?php

namespace Modules\Training\Http\Controllers\AIDrivenLearningRecommendation;

use Modules\Training\Repositories\AIDrivenLearningRecommendation\AIDrivenLearningRecommendationRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Training\Transformers\BaseCollection\BaseCollection;
use Modules\Training\Http\Requests\AIDrivenLearningRecommendation\AIDrivenLearningRecommendationStoreRequest;
use Modules\Training\Http\Requests\AIDrivenLearningRecommendation\AIDrivenLearningRecommendationUpdateRequest;
use Modules\Training\Transformers\AIDrivenLearningRecommendation\AIDrivenLearningRecommendationResource;
use Modules\Training\Transformers\AIDrivenLearningRecommendation\AIDrivenLearningRecommendationResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class AIDrivenLearningRecommendationController extends Controller
{
    use ApiResponseTrait;

    protected $AIDrivenLearningRecommendationRepository;

    public function __construct(AIDrivenLearningRecommendationRepositoryInterface $AIDrivenLearningRecommendationRepository)
    {
        $this->AIDrivenLearningRecommendationRepository = $AIDrivenLearningRecommendationRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new AIDrivenLearningRecommendationResourceEnums([]),'AIDrivenLearningRecommendation enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->AIDrivenLearningRecommendationRepository->all(), 'aidrivenlearningrecommendation', AIDrivenLearningRecommendationResource::class),
         'AIDrivenLearningRecommendation list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->AIDrivenLearningRecommendationRepository->find($id);
        if (!$data) {
            return $this->errorResponse('AIDrivenLearningRecommendation not found', 404);
        }
        return $this->successResponse(new AIDrivenLearningRecommendationResource($data), 'AIDrivenLearningRecommendation retrieved successfully');
    }

    public function store(AIDrivenLearningRecommendationStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->AIDrivenLearningRecommendationRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new AIDrivenLearningRecommendationResource($record), 'AIDrivenLearningRecommendation created successfully', 201);
    }

    public function update(AIDrivenLearningRecommendationUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->AIDrivenLearningRecommendationRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new AIDrivenLearningRecommendationResource($record), 'AIDrivenLearningRecommendation updated successfully');
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

        $deletedCount = $this->AIDrivenLearningRecommendationRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} AIDrivenLearningRecommendation deleted successfully");
    }
}
