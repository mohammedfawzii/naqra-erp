<?php

namespace Modules\Employee\Http\Controllers\EmployeeContact;

use Modules\Employee\Repositories\EmployeeContact\EmployeeContactRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Employee\Transformers\BaseCollection\BaseCollection;
use Modules\Employee\Http\Requests\EmployeeContact\EmployeeContactStoreRequest;
use Modules\Employee\Http\Requests\EmployeeContact\EmployeeContactUpdateRequest;
use Modules\Employee\Transformers\EmployeeContact\EmployeeContactResource;
use Modules\Employee\Transformers\EmployeeContact\EmployeeContactResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;


class EmployeeContactController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'home1';

    protected $EmployeeContactRepository;

    public function __construct(EmployeeContactRepositoryInterface $EmployeeContactRepository)
    {
        $this->EmployeeContactRepository = $EmployeeContactRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new EmployeeContactResourceEnums([]),'EmployeeContact enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->EmployeeContactRepository->all(), 'employeecontact', EmployeeContactResource::class),
         'EmployeeContact list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->EmployeeContactRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EmployeeContact not found', 404);
        }
        return $this->successResponse(new EmployeeContactResource($data), 'EmployeeContact retrieved successfully');
    }

    public function store(EmployeeContactStoreRequest $request, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeContactRepository->create($validated);
        $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }

        return $this->successResponse(new EmployeeContactResource($record), 'EmployeeContact created successfully', 201);
    }

    public function update(EmployeeContactUpdateRequest $request, $id, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeContactRepository->update($id, $validated);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }
    $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        return $this->successResponse(new EmployeeContactResource($record), 'EmployeeContact updated successfully');
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

        $deletedCount = $this->EmployeeContactRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} EmployeeContact deleted successfully");
    }
}
