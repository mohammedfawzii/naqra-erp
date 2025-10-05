<?php

namespace Modules\Performance\Http\Controllers\PromotionReward;

use Modules\Performance\Repositories\PromotionReward\PromotionRewardRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Performance\Transformers\BaseCollection\BaseCollection;
use Modules\Performance\Http\Requests\PromotionReward\PromotionRewardStoreRequest;
use Modules\Performance\Http\Requests\PromotionReward\PromotionRewardUpdateRequest;
use Modules\Performance\Transformers\PromotionReward\PromotionRewardResource;
use Modules\Performance\Transformers\PromotionReward\PromotionRewardResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class PromotionRewardController extends Controller
{
    use ApiResponseTrait;

    protected $PromotionRewardRepository;

    public function __construct(PromotionRewardRepositoryInterface $PromotionRewardRepository)
    {
        $this->PromotionRewardRepository = $PromotionRewardRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new PromotionRewardResourceEnums([]),'PromotionReward enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->PromotionRewardRepository->all(), 'promotionreward', PromotionRewardResource::class),
         'PromotionReward list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->PromotionRewardRepository->find($id);
        if (!$data) {
            return $this->errorResponse('PromotionReward not found', 404);
        }
        return $this->successResponse(new PromotionRewardResource($data), 'PromotionReward retrieved successfully');
    }

    public function store(PromotionRewardStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->PromotionRewardRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new PromotionRewardResource($record), 'PromotionReward created successfully', 201);
    }

    public function update(PromotionRewardUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->PromotionRewardRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new PromotionRewardResource($record), 'PromotionReward updated successfully');
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

        $deletedCount = $this->PromotionRewardRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} PromotionReward deleted successfully");
    }
}
