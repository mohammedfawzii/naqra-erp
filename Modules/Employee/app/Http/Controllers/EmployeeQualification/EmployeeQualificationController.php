<?php

namespace Modules\Employee\Http\Controllers\EmployeeQualification;

use Modules\Employee\Repositories\EmployeeQualification\EmployeeQualificationRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Employee\Transformers\BaseCollection\BaseCollection;
use Modules\Employee\Http\Requests\EmployeeQualification\EmployeeQualificationStoreRequest;
use Modules\Employee\Http\Requests\EmployeeQualification\EmployeeQualificationUpdateRequest;
use Modules\Employee\Transformers\EmployeeQualification\EmployeeQualificationResource;
use Modules\Employee\Transformers\EmployeeQualification\EmployeeQualificationResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;


class EmployeeQualificationController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'home1';

    protected $EmployeeQualificationRepository;

    public function __construct(EmployeeQualificationRepositoryInterface $EmployeeQualificationRepository)
    {
        $this->EmployeeQualificationRepository = $EmployeeQualificationRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new EmployeeQualificationResourceEnums([]),'EmployeeQualification enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->EmployeeQualificationRepository->all(), 'employeequalification', EmployeeQualificationResource::class),
         'EmployeeQualification list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->EmployeeQualificationRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EmployeeQualification not found', 404);
        }
        return $this->successResponse(new EmployeeQualificationResource($data), 'EmployeeQualification retrieved successfully');
    }

    public function store(EmployeeQualificationStoreRequest $request, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeQualificationRepository->create($validated);
        $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }

        return $this->successResponse(new EmployeeQualificationResource($record), 'EmployeeQualification created successfully', 201);
    }

    public function update(EmployeeQualificationUpdateRequest $request, $id, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeQualificationRepository->update($id, $validated);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }
    $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        return $this->successResponse(new EmployeeQualificationResource($record), 'EmployeeQualification updated successfully');
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

        $deletedCount = $this->EmployeeQualificationRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} EmployeeQualification deleted successfully");
    }
}
