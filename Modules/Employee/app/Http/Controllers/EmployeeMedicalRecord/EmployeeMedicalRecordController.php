<?php

namespace Modules\Employee\Http\Controllers\EmployeeMedicalRecord;

use Modules\Employee\Repositories\EmployeeMedicalRecord\EmployeeMedicalRecordRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Employee\Transformers\BaseCollection\BaseCollection;
use Modules\Employee\Http\Requests\EmployeeMedicalRecord\EmployeeMedicalRecordStoreRequest;
use Modules\Employee\Http\Requests\EmployeeMedicalRecord\EmployeeMedicalRecordUpdateRequest;
use Modules\Employee\Transformers\EmployeeMedicalRecord\EmployeeMedicalRecordResource;
use Modules\Employee\Transformers\EmployeeMedicalRecord\EmployeeMedicalRecordResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;


class EmployeeMedicalRecordController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'home1';

    protected $EmployeeMedicalRecordRepository;

    public function __construct(EmployeeMedicalRecordRepositoryInterface $EmployeeMedicalRecordRepository)
    {
        $this->EmployeeMedicalRecordRepository = $EmployeeMedicalRecordRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new EmployeeMedicalRecordResourceEnums([]),'EmployeeMedicalRecord enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->EmployeeMedicalRecordRepository->all(), 'employeemedicalrecord', EmployeeMedicalRecordResource::class),
         'EmployeeMedicalRecord list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->EmployeeMedicalRecordRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EmployeeMedicalRecord not found', 404);
        }
        return $this->successResponse(new EmployeeMedicalRecordResource($data), 'EmployeeMedicalRecord retrieved successfully');
    }

    public function store(EmployeeMedicalRecordStoreRequest $request, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeMedicalRecordRepository->create($validated);
        $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }

        return $this->successResponse(new EmployeeMedicalRecordResource($record), 'EmployeeMedicalRecord created successfully', 201);
    }

    public function update(EmployeeMedicalRecordUpdateRequest $request, $id, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeMedicalRecordRepository->update($id, $validated);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }
    $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        return $this->successResponse(new EmployeeMedicalRecordResource($record), 'EmployeeMedicalRecord updated successfully');
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

        $deletedCount = $this->EmployeeMedicalRecordRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} EmployeeMedicalRecord deleted successfully");
    }
}
