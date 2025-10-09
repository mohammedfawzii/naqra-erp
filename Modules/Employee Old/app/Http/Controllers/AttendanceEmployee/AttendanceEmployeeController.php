<?php

namespace Modules\Employee\Http\Controllers\AttendanceEmployee;

use Modules\Employee\Repositories\AttendanceEmployee\AttendanceEmployeeRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Employee\Transformers\BaseCollection\BaseCollection;
use Modules\Employee\Http\Requests\AttendanceEmployee\AttendanceEmployeeStoreRequest;
use Modules\Employee\Http\Requests\AttendanceEmployee\AttendanceEmployeeUpdateRequest;
use Modules\Employee\Transformers\AttendanceEmployee\AttendanceEmployeeResource;
use Modules\Employee\Transformers\AttendanceEmployee\AttendanceEmployeeResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;


class AttendanceEmployeeController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'home1';

    protected $AttendanceEmployeeRepository;

    public function __construct(AttendanceEmployeeRepositoryInterface $AttendanceEmployeeRepository)
    {
        $this->AttendanceEmployeeRepository = $AttendanceEmployeeRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new AttendanceEmployeeResourceEnums([]),'AttendanceEmployee enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->AttendanceEmployeeRepository->all(), 'attendanceemployee', AttendanceEmployeeResource::class),
         'AttendanceEmployee list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->AttendanceEmployeeRepository->find($id);
        if (!$data) {
            return $this->errorResponse('AttendanceEmployee not found', 404);
        }
        return $this->successResponse(new AttendanceEmployeeResource($data), 'AttendanceEmployee retrieved successfully');
    }

    public function store(AttendanceEmployeeStoreRequest $request, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->AttendanceEmployeeRepository->create($validated);
        $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }

        return $this->successResponse(new AttendanceEmployeeResource($record), 'AttendanceEmployee created successfully', 201);
    }

    public function update(AttendanceEmployeeUpdateRequest $request, $id, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->AttendanceEmployeeRepository->update($id, $validated);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }
    $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        return $this->successResponse(new AttendanceEmployeeResource($record), 'AttendanceEmployee updated successfully');
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

        $deletedCount = $this->AttendanceEmployeeRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} AttendanceEmployee deleted successfully");
    }
}
