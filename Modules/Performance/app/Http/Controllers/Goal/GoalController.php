<?php

namespace Modules\Performance\Http\Controllers\Goal;

use Modules\Performance\Repositories\Goal\GoalRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Performance\Transformers\BaseCollection\BaseCollection;
use Modules\Performance\Http\Requests\Goal\GoalStoreRequest;
use Modules\Performance\Http\Requests\Goal\GoalUpdateRequest;
use Modules\Performance\Transformers\Goal\GoalResource;
use Modules\Performance\Transformers\Goal\GoalResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class GoalController extends Controller
{
    use ApiResponseTrait;

    protected $GoalRepository;

    public function __construct(GoalRepositoryInterface $GoalRepository)
    {
        $this->GoalRepository = $GoalRepository;
    }

    public function index(Request $request)
    {
    return $request->boolean('list')
    ? $this->successResponse(new GoalResourceEnums([]),'Goal enums retrieved successfully')
    : $this->successResponse(new BaseCollection($this->GoalRepository->all(), 'goal', GoalResource::class),
                'Goal list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->GoalRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Goal not found', 404);
        }
        return $this->successResponse(new GoalResource($data), 'Goal retrieved successfully');
    }

    public function store(GoalStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->GoalRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new GoalResource($record), 'Goal created successfully', 201);
    }

    public function update(GoalUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->GoalRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new GoalResource($record), 'Goal updated successfully');
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

        $deletedCount = $this->GoalRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} Goal deleted successfully");
    }
}
