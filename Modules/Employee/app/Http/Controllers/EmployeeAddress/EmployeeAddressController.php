<?php

namespace Modules\Employee\Http\Controllers\EmployeeAddress;

use Modules\Employee\Repositories\EmployeeAddress\EmployeeAddressRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Employee\Transformers\BaseCollection\BaseCollection;
use Modules\Employee\Http\Requests\EmployeeAddress\EmployeeAddressStoreRequest;
use Modules\Employee\Http\Requests\EmployeeAddress\EmployeeAddressUpdateRequest;
use Modules\Employee\Transformers\EmployeeAddress\EmployeeAddressResource;
use Modules\Employee\Transformers\EmployeeAddress\EmployeeAddressResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;


class EmployeeAddressController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'home4';

    protected $EmployeeAddressRepository;

    public function __construct(EmployeeAddressRepositoryInterface $EmployeeAddressRepository)
    {
        $this->EmployeeAddressRepository = $EmployeeAddressRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new EmployeeAddressResourceEnums([]),'EmployeeAddress enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->EmployeeAddressRepository->all(), 'employeeaddress', EmployeeAddressResource::class),
         'EmployeeAddress list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->EmployeeAddressRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EmployeeAddress not found', 404);
        }
        return $this->successResponse(new EmployeeAddressResource($data), 'EmployeeAddress retrieved successfully');
    }

    public function store(EmployeeAddressStoreRequest $request, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeAddressRepository->create($validated);
        $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }

        return $this->successResponse(new EmployeeAddressResource($record), 'EmployeeAddress created successfully', 201);
    }

    public function update(EmployeeAddressUpdateRequest $request, $id, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeAddressRepository->update($id, $validated);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }
    $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        return $this->successResponse(new EmployeeAddressResource($record), 'EmployeeAddress updated successfully');
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

        $deletedCount = $this->EmployeeAddressRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} EmployeeAddress deleted successfully");
    }
}
