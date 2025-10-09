<?php

namespace Modules\Facilities\Http\Controllers\MedicalInsurancesFacilities;

use Modules\Facilities\Repositories\MedicalInsurancesFacilities\MedicalInsurancesFacilitiesRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;
use Modules\Facilities\Http\Requests\MedicalInsurancesFacilities\MedicalInsurancesFacilitiesStoreRequest;
use Modules\Facilities\Http\Requests\MedicalInsurancesFacilities\MedicalInsurancesFacilitiesUpdateRequest;
use Modules\Facilities\Transformers\MedicalInsurancesFacilities\MedicalInsurancesFacilitiesResource;
use Modules\Facilities\Transformers\MedicalInsurancesFacilities\MedicalInsurancesFacilitiesResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;


class MedicalInsurancesFacilitiesController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'home1';

    protected $MedicalInsurancesFacilitiesRepository;

    public function __construct(MedicalInsurancesFacilitiesRepositoryInterface $MedicalInsurancesFacilitiesRepository)
    {
        $this->MedicalInsurancesFacilitiesRepository = $MedicalInsurancesFacilitiesRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new MedicalInsurancesFacilitiesResourceEnums([]),'MedicalInsurancesFacilities enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->MedicalInsurancesFacilitiesRepository->all(), 'medicalinsurancesfacilities', MedicalInsurancesFacilitiesResource::class),
         'MedicalInsurancesFacilities list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->MedicalInsurancesFacilitiesRepository->find($id);
        if (!$data) {
            return $this->errorResponse('MedicalInsurancesFacilities not found', 404);
        }
        return $this->successResponse(new MedicalInsurancesFacilitiesResource($data), 'MedicalInsurancesFacilities retrieved successfully');
    }

    public function store(MedicalInsurancesFacilitiesStoreRequest $request, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->MedicalInsurancesFacilitiesRepository->create($validated);
        // $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Facilities'));
        }

        return $this->successResponse(new MedicalInsurancesFacilitiesResource($record), 'MedicalInsurancesFacilities created successfully', 201);
    }

    public function update(MedicalInsurancesFacilitiesUpdateRequest $request, $id, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->MedicalInsurancesFacilitiesRepository->update($id, $validated);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Facilities'));
        }
    // $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        return $this->successResponse(new MedicalInsurancesFacilitiesResource($record), 'MedicalInsurancesFacilities updated successfully');
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

        $deletedCount = $this->MedicalInsurancesFacilitiesRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} MedicalInsurancesFacilities deleted successfully");
    }
}
