<?php

namespace Modules\Employee\Http\Controllers\EmployeeSkill;

use Modules\Employee\Repositories\EmployeeSkill\EmployeeSkillRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Employee\Transformers\BaseCollection\BaseCollection;
use Modules\Employee\Http\Requests\EmployeeSkill\EmployeeSkillStoreRequest;
use Modules\Employee\Http\Requests\EmployeeSkill\EmployeeSkillUpdateRequest;
use Modules\Employee\Transformers\EmployeeSkill\EmployeeSkillResource;
use Modules\Employee\Transformers\EmployeeSkill\EmployeeSkillResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;


class EmployeeSkillController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'home1';

    protected $EmployeeSkillRepository;

    public function __construct(EmployeeSkillRepositoryInterface $EmployeeSkillRepository)
    {
        $this->EmployeeSkillRepository = $EmployeeSkillRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new EmployeeSkillResourceEnums([]),'EmployeeSkill enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->EmployeeSkillRepository->all(), 'employeeskill', EmployeeSkillResource::class),
         'EmployeeSkill list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->EmployeeSkillRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EmployeeSkill not found', 404);
        }
        return $this->successResponse(new EmployeeSkillResource($data), 'EmployeeSkill retrieved successfully');
    }

    public function store(EmployeeSkillStoreRequest $request, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeSkillRepository->create($validated);
        $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }

        return $this->successResponse(new EmployeeSkillResource($record), 'EmployeeSkill created successfully', 201);
    }

    public function update(EmployeeSkillUpdateRequest $request, $id, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeSkillRepository->update($id, $validated);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }
    $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        return $this->successResponse(new EmployeeSkillResource($record), 'EmployeeSkill updated successfully');
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

        $deletedCount = $this->EmployeeSkillRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} EmployeeSkill deleted successfully");
    }
}
