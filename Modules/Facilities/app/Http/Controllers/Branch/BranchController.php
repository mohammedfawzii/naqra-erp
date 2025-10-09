<?php

namespace Modules\Facilities\Http\Controllers\Branch;

use Modules\Facilities\Repositories\Branch\BranchRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;
use Modules\Facilities\Http\Requests\Branch\BranchStoreRequest;
use Modules\Facilities\Http\Requests\Branch\BranchUpdateRequest;
use Modules\Facilities\Transformers\Branch\BranchResource;
use Modules\Facilities\Transformers\Branch\BranchResourceEnums;
use App\Services\AttachmentService\AttachmentService;
 use Modules\Facilities\Services\CompleteFacilityService;

class BranchController extends Controller
{
    use ApiResponseTrait;

    public string $pageName = 'branches';

    public function __construct(
        protected BranchRepositoryInterface $branchRepository,
        protected  AttachmentService $attachmentService,
        protected CompleteFacilityService $completionService
    ) {}

    public function index(Request $request)
    {
        if ($request->boolean('list')) {
            return $this->successResponse(
                new BranchResourceEnums([]),
                'Branch enums retrieved successfully'
            );
        }

        return $this->successResponse(
            new BaseCollection(
                $this->branchRepository->all(),
                'branch',
                BranchResource::class
            ),
            'Branch list retrieved successfully'
        );
    }

    public function show($id)
    {
        $branch = $this->branchRepository->find($id);
        if (!$branch) {
            return $this->errorResponse('Branch not found', 404);
        }
        return $this->successResponse(new BranchResource($branch), 'Branch retrieved successfully');
    }

    public function store(BranchStoreRequest $request)
    {
        $validated = $request->validated();
        $files = $validated['files'] ?? null;
        unset($validated['files']);
        $branch = $this->branchRepository->create($validated);
        $this->attachmentService->uploadFiles($files, $branch, 'facilities');
        $this->completionService->syncCompletion($validated, $request, $this->pageName);
        return $this->successResponse(new BranchResource($branch), 'Branch created successfully', 201);
    }


    public function update(BranchUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $files = $validated['files'] ?? null;
        unset($validated['files']);
        $branch = $this->branchRepository->update($id, $validated);
        $this->attachmentService->uploadFiles($files, $branch, 'facilities');
        $this->completionService->syncCompletion($validated, $request, $this->pageName);
        return $this->successResponse(new BranchResource($branch), 'Branch updated successfully');
    }

    public function destroy(Request $request)
    {
        $ids = $this->parseIds($request);

        if (empty($ids)) {
            return $this->errorResponse('IDs must be an array', 400);
        }

        $deletedCount = $this->branchRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} Branch deleted successfully");
    }

    protected function parseIds(Request $request): array
    {
        $ids = $request->input('ids', []);
        if (is_string($ids)) {
            $ids = json_decode($ids, true);
        }
        return is_array($ids) ? $ids : [];
    }
}
