<?php

namespace Modules\Performance\Http\Controllers\Evaluation;

use Modules\Performance\Repositories\Evaluation\EvaluationRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Performance\Transformers\BaseCollection\BaseCollection;
use Modules\Performance\Http\Requests\Evaluation\EvaluationStoreRequest;
use Modules\Performance\Http\Requests\Evaluation\EvaluationUpdateRequest;
use Modules\Performance\Transformers\Evaluation\EvaluationResource;
use Modules\Performance\Transformers\Evaluation\EvaluationResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class EvaluationController extends Controller
{
    use ApiResponseTrait;

    protected $EvaluationRepository;

    public function __construct(EvaluationRepositoryInterface $EvaluationRepository)
    {
        $this->EvaluationRepository = $EvaluationRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new EvaluationResourceEnums([]),'Evaluation enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->EvaluationRepository->all(), 'evaluation', EvaluationResource::class),
         'Evaluation list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->EvaluationRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Evaluation not found', 404);
        }
        return $this->successResponse(new EvaluationResource($data), 'Evaluation retrieved successfully');
    }

    public function store(EvaluationStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->EvaluationRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new EvaluationResource($record), 'Evaluation created successfully', 201);
    }

    public function update(EvaluationUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->EvaluationRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new EvaluationResource($record), 'Evaluation updated successfully');
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

        $deletedCount = $this->EvaluationRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} Evaluation deleted successfully");
    }
}
