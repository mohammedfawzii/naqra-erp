<?php

namespace Modules\Training\Http\Controllers\TrainingNeedsAssessment;

use Modules\Training\Repositories\TrainingNeedsAssessment\TrainingNeedsAssessmentRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Training\Transformers\BaseCollection\BaseCollection;
use Modules\Training\Http\Requests\TrainingNeedsAssessment\TrainingNeedsAssessmentStoreRequest;
use Modules\Training\Http\Requests\TrainingNeedsAssessment\TrainingNeedsAssessmentUpdateRequest;
use Modules\Training\Transformers\TrainingNeedsAssessment\TrainingNeedsAssessmentResource;
use Modules\Training\Transformers\TrainingNeedsAssessment\TrainingNeedsAssessmentResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class TrainingNeedsAssessmentController extends Controller
{
    use ApiResponseTrait;

    protected $TrainingNeedsAssessmentRepository;

    public function __construct(TrainingNeedsAssessmentRepositoryInterface $TrainingNeedsAssessmentRepository)
    {
        $this->TrainingNeedsAssessmentRepository = $TrainingNeedsAssessmentRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new TrainingNeedsAssessmentResourceEnums([]),'TrainingNeedsAssessment enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->TrainingNeedsAssessmentRepository->all(), 'trainingneedsassessment', TrainingNeedsAssessmentResource::class),
         'TrainingNeedsAssessment list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->TrainingNeedsAssessmentRepository->find($id);
        if (!$data) {
            return $this->errorResponse('TrainingNeedsAssessment not found', 404);
        }
        return $this->successResponse(new TrainingNeedsAssessmentResource($data), 'TrainingNeedsAssessment retrieved successfully');
    }

    public function store(TrainingNeedsAssessmentStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->TrainingNeedsAssessmentRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new TrainingNeedsAssessmentResource($record), 'TrainingNeedsAssessment created successfully', 201);
    }

    public function update(TrainingNeedsAssessmentUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->TrainingNeedsAssessmentRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new TrainingNeedsAssessmentResource($record), 'TrainingNeedsAssessment updated successfully');
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

        $deletedCount = $this->TrainingNeedsAssessmentRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} TrainingNeedsAssessment deleted successfully");
    }
}
