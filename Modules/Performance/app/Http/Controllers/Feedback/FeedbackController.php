<?php

namespace Modules\Performance\Http\Controllers\Feedback;

use Modules\Performance\Repositories\Feedback\FeedbackRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Performance\Transformers\BaseCollection\BaseCollection;
use Modules\Performance\Http\Requests\Feedback\FeedbackStoreRequest;
use Modules\Performance\Http\Requests\Feedback\FeedbackUpdateRequest;
use Modules\Performance\Transformers\Feedback\FeedbackResource;
use Modules\Performance\Transformers\Feedback\FeedbackResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class FeedbackController extends Controller
{
    use ApiResponseTrait;

    protected $FeedbackRepository;

    public function __construct(FeedbackRepositoryInterface $FeedbackRepository)
    {
        $this->FeedbackRepository = $FeedbackRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new FeedbackResourceEnums([]),'Feedback enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->FeedbackRepository->all(), 'feedback', FeedbackResource::class),
         'Feedback list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->FeedbackRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Feedback not found', 404);
        }
        return $this->successResponse(new FeedbackResource($data), 'Feedback retrieved successfully');
    }

    public function store(FeedbackStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->FeedbackRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new FeedbackResource($record), 'Feedback created successfully', 201);
    }

    public function update(FeedbackUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->FeedbackRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new FeedbackResource($record), 'Feedback updated successfully');
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

        $deletedCount = $this->FeedbackRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} Feedback deleted successfully");
    }
}
