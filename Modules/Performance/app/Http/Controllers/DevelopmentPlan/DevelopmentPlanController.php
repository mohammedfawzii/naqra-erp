<?php

namespace Modules\Performance\Http\Controllers\DevelopmentPlan;

use Modules\Performance\Repositories\DevelopmentPlan\DevelopmentPlanRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Performance\Transformers\BaseCollection\BaseCollection;
use Modules\Performance\Http\Requests\DevelopmentPlan\DevelopmentPlanStoreRequest;
use Modules\Performance\Http\Requests\DevelopmentPlan\DevelopmentPlanUpdateRequest;
use Modules\Performance\Transformers\DevelopmentPlan\DevelopmentPlanResource;
use Modules\Performance\Transformers\DevelopmentPlan\DevelopmentPlanResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class DevelopmentPlanController extends Controller
{
    use ApiResponseTrait;

    protected $DevelopmentPlanRepository;

    public function __construct(DevelopmentPlanRepositoryInterface $DevelopmentPlanRepository)
    {
        $this->DevelopmentPlanRepository = $DevelopmentPlanRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new DevelopmentPlanResourceEnums([]),'DevelopmentPlan enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->DevelopmentPlanRepository->all(), 'developmentplan', DevelopmentPlanResource::class),
         'DevelopmentPlan list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->DevelopmentPlanRepository->find($id);
        if (!$data) {
            return $this->errorResponse('DevelopmentPlan not found', 404);
        }
        return $this->successResponse(new DevelopmentPlanResource($data), 'DevelopmentPlan retrieved successfully');
    }

    public function store(DevelopmentPlanStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->DevelopmentPlanRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new DevelopmentPlanResource($record), 'DevelopmentPlan created successfully', 201);
    }

    public function update(DevelopmentPlanUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->DevelopmentPlanRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new DevelopmentPlanResource($record), 'DevelopmentPlan updated successfully');
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

        $deletedCount = $this->DevelopmentPlanRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} DevelopmentPlan deleted successfully");
    }
}
