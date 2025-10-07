<?php

namespace Modules\Employee\Http\Controllers\EmployeeDebendent;

use Modules\Employee\Repositories\EmployeeDebendent\EmployeeDebendentRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Employee\Transformers\BaseCollection\BaseCollection;
use Modules\Employee\Http\Requests\EmployeeDebendent\EmployeeDebendentStoreRequest;
use Modules\Employee\Http\Requests\EmployeeDebendent\EmployeeDebendentUpdateRequest;
use Modules\Employee\Transformers\EmployeeDebendent\EmployeeDebendentResource;
use Modules\Employee\Transformers\EmployeeDebendent\EmployeeDebendentResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;


class EmployeeDebendentController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'home3';

    protected $EmployeeDebendentRepository;

    public function __construct(EmployeeDebendentRepositoryInterface $EmployeeDebendentRepository)
    {
        $this->EmployeeDebendentRepository = $EmployeeDebendentRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new EmployeeDebendentResourceEnums([]),'EmployeeDebendent enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->EmployeeDebendentRepository->all(), 'employeedebendent', EmployeeDebendentResource::class),
         'EmployeeDebendent list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->EmployeeDebendentRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EmployeeDebendent not found', 404);
        }
        return $this->successResponse(new EmployeeDebendentResource($data), 'EmployeeDebendent retrieved successfully');
    }

    public function store(EmployeeDebendentStoreRequest $request, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeDebendentRepository->create($validated);
        $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }

        return $this->successResponse(new EmployeeDebendentResource($record), 'EmployeeDebendent created successfully', 201);
    }

    public function update(EmployeeDebendentUpdateRequest $request, $id, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeDebendentRepository->update($id, $validated);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }
    $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        return $this->successResponse(new EmployeeDebendentResource($record), 'EmployeeDebendent updated successfully');
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

        $deletedCount = $this->EmployeeDebendentRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} EmployeeDebendent deleted successfully");
    }
}
