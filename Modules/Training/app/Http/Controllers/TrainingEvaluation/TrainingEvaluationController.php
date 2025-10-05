<?php

namespace Modules\Training\Http\Controllers\TrainingEvaluation;

use Modules\Training\Repositories\TrainingEvaluation\TrainingEvaluationRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Training\Transformers\BaseCollection\BaseCollection;
use Modules\Training\Http\Requests\TrainingEvaluation\TrainingEvaluationStoreRequest;
use Modules\Training\Http\Requests\TrainingEvaluation\TrainingEvaluationUpdateRequest;
use Modules\Training\Transformers\TrainingEvaluation\TrainingEvaluationResource;
use Modules\Training\Transformers\TrainingEvaluation\TrainingEvaluationResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class TrainingEvaluationController extends Controller
{
    use ApiResponseTrait;

    protected $TrainingEvaluationRepository;

    public function __construct(TrainingEvaluationRepositoryInterface $TrainingEvaluationRepository)
    {
        $this->TrainingEvaluationRepository = $TrainingEvaluationRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new TrainingEvaluationResourceEnums([]),'TrainingEvaluation enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->TrainingEvaluationRepository->all(), 'trainingevaluation', TrainingEvaluationResource::class),
         'TrainingEvaluation list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->TrainingEvaluationRepository->find($id);
        if (!$data) {
            return $this->errorResponse('TrainingEvaluation not found', 404);
        }
        return $this->successResponse(new TrainingEvaluationResource($data), 'TrainingEvaluation retrieved successfully');
    }

    public function store(TrainingEvaluationStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->TrainingEvaluationRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new TrainingEvaluationResource($record), 'TrainingEvaluation created successfully', 201);
    }

    public function update(TrainingEvaluationUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->TrainingEvaluationRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new TrainingEvaluationResource($record), 'TrainingEvaluation updated successfully');
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

        $deletedCount = $this->TrainingEvaluationRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} TrainingEvaluation deleted successfully");
    }
}
