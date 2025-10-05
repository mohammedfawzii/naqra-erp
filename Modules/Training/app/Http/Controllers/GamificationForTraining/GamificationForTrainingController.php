<?php

namespace Modules\Training\Http\Controllers\GamificationForTraining;

use Modules\Training\Repositories\GamificationForTraining\GamificationForTrainingRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Training\Transformers\BaseCollection\BaseCollection;
use Modules\Training\Http\Requests\GamificationForTraining\GamificationForTrainingStoreRequest;
use Modules\Training\Http\Requests\GamificationForTraining\GamificationForTrainingUpdateRequest;
use Modules\Training\Transformers\GamificationForTraining\GamificationForTrainingResource;
use Modules\Training\Transformers\GamificationForTraining\GamificationForTrainingResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class GamificationForTrainingController extends Controller
{
    use ApiResponseTrait;

    protected $GamificationForTrainingRepository;

    public function __construct(GamificationForTrainingRepositoryInterface $GamificationForTrainingRepository)
    {
        $this->GamificationForTrainingRepository = $GamificationForTrainingRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new GamificationForTrainingResourceEnums([]),'GamificationForTraining enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->GamificationForTrainingRepository->all(), 'gamificationfortraining', GamificationForTrainingResource::class),
         'GamificationForTraining list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->GamificationForTrainingRepository->find($id);
        if (!$data) {
            return $this->errorResponse('GamificationForTraining not found', 404);
        }
        return $this->successResponse(new GamificationForTrainingResource($data), 'GamificationForTraining retrieved successfully');
    }

    public function store(GamificationForTrainingStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->GamificationForTrainingRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new GamificationForTrainingResource($record), 'GamificationForTraining created successfully', 201);
    }

    public function update(GamificationForTrainingUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->GamificationForTrainingRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new GamificationForTrainingResource($record), 'GamificationForTraining updated successfully');
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

        $deletedCount = $this->GamificationForTrainingRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} GamificationForTraining deleted successfully");
    }
}
