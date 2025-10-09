<?php

namespace Modules\Employee\Http\Controllers\EmployeeCourse;

use Modules\Employee\Repositories\EmployeeCourse\EmployeeCourseRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Employee\Transformers\BaseCollection\BaseCollection;
use Modules\Employee\Http\Requests\EmployeeCourse\EmployeeCourseStoreRequest;
use Modules\Employee\Http\Requests\EmployeeCourse\EmployeeCourseUpdateRequest;
use Modules\Employee\Transformers\EmployeeCourse\EmployeeCourseResource;
use Modules\Employee\Transformers\EmployeeCourse\EmployeeCourseResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;


class EmployeeCourseController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'home1';

    protected $EmployeeCourseRepository;

    public function __construct(EmployeeCourseRepositoryInterface $EmployeeCourseRepository)
    {
        $this->EmployeeCourseRepository = $EmployeeCourseRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new EmployeeCourseResourceEnums([]),'EmployeeCourse enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->EmployeeCourseRepository->all(), 'employeecourse', EmployeeCourseResource::class),
         'EmployeeCourse list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->EmployeeCourseRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EmployeeCourse not found', 404);
        }
        return $this->successResponse(new EmployeeCourseResource($data), 'EmployeeCourse retrieved successfully');
    }

    public function store(EmployeeCourseStoreRequest $request, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeCourseRepository->create($validated);
        $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }

        return $this->successResponse(new EmployeeCourseResource($record), 'EmployeeCourse created successfully', 201);
    }

    public function update(EmployeeCourseUpdateRequest $request, $id, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeCourseRepository->update($id, $validated);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }
    $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        return $this->successResponse(new EmployeeCourseResource($record), 'EmployeeCourse updated successfully');
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

        $deletedCount = $this->EmployeeCourseRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} EmployeeCourse deleted successfully");
    }
}
