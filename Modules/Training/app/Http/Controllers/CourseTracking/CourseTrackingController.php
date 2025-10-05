<?php

namespace Modules\Training\Http\Controllers\CourseTracking;

use Modules\Training\Repositories\CourseTracking\CourseTrackingRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Training\Transformers\BaseCollection\BaseCollection;
use Modules\Training\Http\Requests\CourseTracking\CourseTrackingStoreRequest;
use Modules\Training\Http\Requests\CourseTracking\CourseTrackingUpdateRequest;
use Modules\Training\Transformers\CourseTracking\CourseTrackingResource;
use Modules\Training\Transformers\CourseTracking\CourseTrackingResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class CourseTrackingController extends Controller
{
    use ApiResponseTrait;

    protected $CourseTrackingRepository;

    public function __construct(CourseTrackingRepositoryInterface $CourseTrackingRepository)
    {
        $this->CourseTrackingRepository = $CourseTrackingRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new CourseTrackingResourceEnums([]),'CourseTracking enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->CourseTrackingRepository->all(), 'coursetracking', CourseTrackingResource::class),
         'CourseTracking list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->CourseTrackingRepository->find($id);
        if (!$data) {
            return $this->errorResponse('CourseTracking not found', 404);
        }
        return $this->successResponse(new CourseTrackingResource($data), 'CourseTracking retrieved successfully');
    }

    public function store(CourseTrackingStoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->CourseTrackingRepository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new CourseTrackingResource($record), 'CourseTracking created successfully', 201);
    }

    public function update(CourseTrackingUpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->CourseTrackingRepository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Training'));
        }

        return $this->successResponse(new CourseTrackingResource($record), 'CourseTracking updated successfully');
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

        $deletedCount = $this->CourseTrackingRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} CourseTracking deleted successfully");
    }
}
