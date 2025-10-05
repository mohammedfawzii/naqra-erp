<?php

namespace Modules\Performance\Http\Controllers\SuccessionPlanning;

use Modules\Performance\Repositories\SuccessionPlanning\SuccessionPlanningRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Performance\Transformers\BaseCollection\BaseCollection;
use Modules\Performance\Http\Requests\SuccessionPlanning\SuccessionPlanningStoreRequest;
use Modules\Performance\Http\Requests\SuccessionPlanning\SuccessionPlanningUpdateRequest;
use Modules\Performance\Transformers\SuccessionPlanning\SuccessionPlanningResource;
use Modules\Performance\Transformers\SuccessionPlanning\SuccessionPlanningResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class SuccessionPlanningController extends Controller
{
    use ApiResponseTrait;

    protected $SuccessionPlanningRepository;

    public function __construct(SuccessionPlanningRepositoryInterface $SuccessionPlanningRepository)
    {
        $this->SuccessionPlanningRepository = $SuccessionPlanningRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new SuccessionPlanningResourceEnums([]),'SuccessionPlanning enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->SuccessionPlanningRepository->all(), 'successionplanning', SuccessionPlanningResource::class),
         'SuccessionPlanning list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->SuccessionPlanningRepository->find($id);
        if (!$data) {
            return $this->errorResponse('SuccessionPlanning not found', 404);
        }
        return $this->successResponse(new SuccessionPlanningResource($data), 'SuccessionPlanning retrieved successfully');
    }

    public function store(SuccessionPlanningStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->SuccessionPlanningRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new SuccessionPlanningResource($record), 'SuccessionPlanning created successfully', 201);
    }

    public function update(SuccessionPlanningUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->SuccessionPlanningRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new SuccessionPlanningResource($record), 'SuccessionPlanning updated successfully');
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

        $deletedCount = $this->SuccessionPlanningRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} SuccessionPlanning deleted successfully");
    }
}
