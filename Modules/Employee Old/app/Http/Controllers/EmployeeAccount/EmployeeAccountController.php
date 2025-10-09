<?php

namespace Modules\Employee\Http\Controllers\EmployeeAccount;

use Modules\Employee\Repositories\EmployeeAccount\EmployeeAccountRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Employee\Transformers\BaseCollection\BaseCollection;
use Modules\Employee\Http\Requests\EmployeeAccount\EmployeeAccountStoreRequest;
use Modules\Employee\Http\Requests\EmployeeAccount\EmployeeAccountUpdateRequest;
use Modules\Employee\Transformers\EmployeeAccount\EmployeeAccountResource;
use Modules\Employee\Transformers\EmployeeAccount\EmployeeAccountResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;


class EmployeeAccountController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'home1';

    protected $EmployeeAccountRepository;

    public function __construct(EmployeeAccountRepositoryInterface $EmployeeAccountRepository)
    {
        $this->EmployeeAccountRepository = $EmployeeAccountRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new EmployeeAccountResourceEnums([]),'EmployeeAccount enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->EmployeeAccountRepository->all(), 'employeeaccount', EmployeeAccountResource::class),
         'EmployeeAccount list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->EmployeeAccountRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EmployeeAccount not found', 404);
        }
        return $this->successResponse(new EmployeeAccountResource($data), 'EmployeeAccount retrieved successfully');
    }

    public function store(EmployeeAccountStoreRequest $request, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeAccountRepository->create($validated);
        $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }

        return $this->successResponse(new EmployeeAccountResource($record), 'EmployeeAccount created successfully', 201);
    }

    public function update(EmployeeAccountUpdateRequest $request, $id, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeAccountRepository->update($id, $validated);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }
    $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        return $this->successResponse(new EmployeeAccountResource($record), 'EmployeeAccount updated successfully');
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

        $deletedCount = $this->EmployeeAccountRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} EmployeeAccount deleted successfully");
    }
}
