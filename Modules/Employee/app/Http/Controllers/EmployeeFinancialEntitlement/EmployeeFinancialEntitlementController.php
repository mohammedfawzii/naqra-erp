<?php

namespace Modules\Employee\Http\Controllers\EmployeeFinancialEntitlement;

use Modules\Employee\Repositories\EmployeeFinancialEntitlement\EmployeeFinancialEntitlementRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Employee\Transformers\BaseCollection\BaseCollection;
use Modules\Employee\Http\Requests\EmployeeFinancialEntitlement\EmployeeFinancialEntitlementStoreRequest;
use Modules\Employee\Http\Requests\EmployeeFinancialEntitlement\EmployeeFinancialEntitlementUpdateRequest;
use Modules\Employee\Transformers\EmployeeFinancialEntitlement\EmployeeFinancialEntitlementResource;
use Modules\Employee\Transformers\EmployeeFinancialEntitlement\EmployeeFinancialEntitlementResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;


class EmployeeFinancialEntitlementController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'home1';

    protected $EmployeeFinancialEntitlementRepository;

    public function __construct(EmployeeFinancialEntitlementRepositoryInterface $EmployeeFinancialEntitlementRepository)
    {
        $this->EmployeeFinancialEntitlementRepository = $EmployeeFinancialEntitlementRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new EmployeeFinancialEntitlementResourceEnums([]),'EmployeeFinancialEntitlement enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->EmployeeFinancialEntitlementRepository->all(), 'employeefinancialentitlement', EmployeeFinancialEntitlementResource::class),
         'EmployeeFinancialEntitlement list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->EmployeeFinancialEntitlementRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EmployeeFinancialEntitlement not found', 404);
        }
        return $this->successResponse(new EmployeeFinancialEntitlementResource($data), 'EmployeeFinancialEntitlement retrieved successfully');
    }

    public function store(EmployeeFinancialEntitlementStoreRequest $request, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeFinancialEntitlementRepository->create($validated);
        $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }

        return $this->successResponse(new EmployeeFinancialEntitlementResource($record), 'EmployeeFinancialEntitlement created successfully', 201);
    }

    public function update(EmployeeFinancialEntitlementUpdateRequest $request, $id, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeFinancialEntitlementRepository->update($id, $validated);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }
    $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        return $this->successResponse(new EmployeeFinancialEntitlementResource($record), 'EmployeeFinancialEntitlement updated successfully');
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

        $deletedCount = $this->EmployeeFinancialEntitlementRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} EmployeeFinancialEntitlement deleted successfully");
    }
}
