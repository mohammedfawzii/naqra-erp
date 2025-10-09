<?php

namespace Modules\Employee\Http\Controllers\EmployeeExperience;

use Modules\Employee\Repositories\EmployeeExperience\EmployeeExperienceRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Employee\Transformers\BaseCollection\BaseCollection;
use Modules\Employee\Http\Requests\EmployeeExperience\EmployeeExperienceStoreRequest;
use Modules\Employee\Http\Requests\EmployeeExperience\EmployeeExperienceUpdateRequest;
use Modules\Employee\Transformers\EmployeeExperience\EmployeeExperienceResource;
use Modules\Employee\Transformers\EmployeeExperience\EmployeeExperienceResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;


class EmployeeExperienceController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'home4';

    protected $EmployeeExperienceRepository;

    public function __construct(EmployeeExperienceRepositoryInterface $EmployeeExperienceRepository)
    {
        $this->EmployeeExperienceRepository = $EmployeeExperienceRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new EmployeeExperienceResourceEnums([]),'EmployeeExperience enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->EmployeeExperienceRepository->all(), 'employeeexperience', EmployeeExperienceResource::class),
         'EmployeeExperience list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->EmployeeExperienceRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EmployeeExperience not found', 404);
        }
        return $this->successResponse(new EmployeeExperienceResource($data), 'EmployeeExperience retrieved successfully');
    }

    public function store(EmployeeExperienceStoreRequest $request, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeExperienceRepository->create($validated);
        $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }

        return $this->successResponse(new EmployeeExperienceResource($record), 'EmployeeExperience created successfully', 201);
    }

    public function update(EmployeeExperienceUpdateRequest $request, $id, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeExperienceRepository->update($id, $validated);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }
    $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        return $this->successResponse(new EmployeeExperienceResource($record), 'EmployeeExperience updated successfully');
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
        $deletedCount = $this->EmployeeExperienceRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} EmployeeExperience deleted successfully");
    }
}
