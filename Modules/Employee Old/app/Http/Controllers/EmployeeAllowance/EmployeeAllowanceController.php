<?php

namespace Modules\Employee\Http\Controllers\EmployeeAllowance;

use Modules\Employee\Repositories\EmployeeAllowance\EmployeeAllowanceRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Employee\Transformers\BaseCollection\BaseCollection;
use Modules\Employee\Http\Requests\EmployeeAllowance\EmployeeAllowanceStoreRequest;
use Modules\Employee\Http\Requests\EmployeeAllowance\EmployeeAllowanceUpdateRequest;
use Modules\Employee\Transformers\EmployeeAllowance\EmployeeAllowanceResource;
use Modules\Employee\Transformers\EmployeeAllowance\EmployeeAllowanceResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;


class EmployeeAllowanceController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'home1';

    protected $EmployeeAllowanceRepository;

    public function __construct(EmployeeAllowanceRepositoryInterface $EmployeeAllowanceRepository)
    {
        $this->EmployeeAllowanceRepository = $EmployeeAllowanceRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new EmployeeAllowanceResourceEnums([]),'EmployeeAllowance enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->EmployeeAllowanceRepository->all(), 'employeeallowance', EmployeeAllowanceResource::class),
         'EmployeeAllowance list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->EmployeeAllowanceRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EmployeeAllowance not found', 404);
        }
        return $this->successResponse(new EmployeeAllowanceResource($data), 'EmployeeAllowance retrieved successfully');
    }

    public function store(EmployeeAllowanceStoreRequest $request, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeAllowanceRepository->create($validated);
        $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }

        return $this->successResponse(new EmployeeAllowanceResource($record), 'EmployeeAllowance created successfully', 201);
    }

    public function update(EmployeeAllowanceUpdateRequest $request, $id, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeAllowanceRepository->update($id, $validated);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }
    $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        return $this->successResponse(new EmployeeAllowanceResource($record), 'EmployeeAllowance updated successfully');
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

        $deletedCount = $this->EmployeeAllowanceRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} EmployeeAllowance deleted successfully");
    }
}
