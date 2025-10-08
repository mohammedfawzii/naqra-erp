<?php

namespace Modules\Employee\Http\Controllers\EmployeeOtherEntitlement;

use Modules\Employee\Repositories\EmployeeOtherEntitlement\EmployeeOtherEntitlementRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Employee\Transformers\BaseCollection\BaseCollection;
use Modules\Employee\Http\Requests\EmployeeOtherEntitlement\EmployeeOtherEntitlementStoreRequest;
use Modules\Employee\Http\Requests\EmployeeOtherEntitlement\EmployeeOtherEntitlementUpdateRequest;
use Modules\Employee\Transformers\EmployeeOtherEntitlement\EmployeeOtherEntitlementResource;
use Modules\Employee\Transformers\EmployeeOtherEntitlement\EmployeeOtherEntitlementResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;


class EmployeeOtherEntitlementController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'home1';

    protected $EmployeeOtherEntitlementRepository;

    public function __construct(EmployeeOtherEntitlementRepositoryInterface $EmployeeOtherEntitlementRepository)
    {
        $this->EmployeeOtherEntitlementRepository = $EmployeeOtherEntitlementRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new EmployeeOtherEntitlementResourceEnums([]),'EmployeeOtherEntitlement enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->EmployeeOtherEntitlementRepository->all(), 'employeeotherentitlement', EmployeeOtherEntitlementResource::class),
         'EmployeeOtherEntitlement list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->EmployeeOtherEntitlementRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EmployeeOtherEntitlement not found', 404);
        }
        return $this->successResponse(new EmployeeOtherEntitlementResource($data), 'EmployeeOtherEntitlement retrieved successfully');
    }

    public function store(EmployeeOtherEntitlementStoreRequest $request, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeOtherEntitlementRepository->create($validated);
        $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }

        return $this->successResponse(new EmployeeOtherEntitlementResource($record), 'EmployeeOtherEntitlement created successfully', 201);
    }

    public function update(EmployeeOtherEntitlementUpdateRequest $request, $id, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeOtherEntitlementRepository->update($id, $validated);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }
    $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        return $this->successResponse(new EmployeeOtherEntitlementResource($record), 'EmployeeOtherEntitlement updated successfully');
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

        $deletedCount = $this->EmployeeOtherEntitlementRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} EmployeeOtherEntitlement deleted successfully");
    }
}
