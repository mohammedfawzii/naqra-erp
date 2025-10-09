<?php

namespace Modules\Employee\Http\Controllers\PersonalInformationEmployee;

use Modules\Employee\Repositories\PersonalInformationEmployee\PersonalInformationEmployeeRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Employee\Transformers\BaseCollection\BaseCollection;
use Modules\Employee\Http\Requests\PersonalInformationEmployee\PersonalInformationEmployeeStoreRequest;
use Modules\Employee\Http\Requests\PersonalInformationEmployee\PersonalInformationEmployeeUpdateRequest;
use Modules\Employee\Transformers\PersonalInformationEmployee\PersonalInformationEmployeeResource;
use Modules\Employee\Transformers\PersonalInformationEmployee\PersonalInformationEmployeeResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;


class PersonalInformationEmployeeController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'home1';

    protected $PersonalInformationEmployeeRepository;

    public function __construct(PersonalInformationEmployeeRepositoryInterface $PersonalInformationEmployeeRepository)
    {
        $this->PersonalInformationEmployeeRepository = $PersonalInformationEmployeeRepository;
    }
    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new PersonalInformationEmployeeResourceEnums([]),'PersonalInformationEmployee enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->PersonalInformationEmployeeRepository->all(), 'personalinformationemployee', PersonalInformationEmployeeResource::class),
         'PersonalInformationEmployee list retrieved successfully'
            );
    }
    public function show($id)
    {
        $data = $this->PersonalInformationEmployeeRepository->find($id);
        if (!$data) {
            return $this->errorResponse('PersonalInformationEmployee not found', 404);
        }
        return $this->successResponse(new PersonalInformationEmployeeResource($data), 'PersonalInformationEmployee retrieved successfully');
    }

    public function store(PersonalInformationEmployeeStoreRequest $request, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
         $files = $request->file('files') ?? [];
        unset($validated['files']);
        $record = $this->PersonalInformationEmployeeRepository->create($validated);
        $percentageService->syncCompletion($validated,$request,$this->pageName);
        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }
        return $this->successResponse(new PersonalInformationEmployeeResource($record), 'PersonalInformationEmployee created successfully', 201);
    }

    public function update(PersonalInformationEmployeeUpdateRequest $request, $id, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $record = $this->PersonalInformationEmployeeRepository->update($id, $validated);
        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }
        $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);
        return $this->successResponse(new PersonalInformationEmployeeResource($record), 'PersonalInformationEmployee updated successfully');
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

        $deletedCount = $this->PersonalInformationEmployeeRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} PersonalInformationEmployee deleted successfully");
    }
}
