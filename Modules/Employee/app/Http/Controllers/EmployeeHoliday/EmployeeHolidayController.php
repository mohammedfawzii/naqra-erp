<?php

namespace Modules\Employee\Http\Controllers\EmployeeHoliday;

use Modules\Employee\Repositories\EmployeeHoliday\EmployeeHolidayRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Employee\Transformers\BaseCollection\BaseCollection;
use Modules\Employee\Http\Requests\EmployeeHoliday\EmployeeHolidayStoreRequest;
use Modules\Employee\Http\Requests\EmployeeHoliday\EmployeeHolidayUpdateRequest;
use Modules\Employee\Transformers\EmployeeHoliday\EmployeeHolidayResource;
use Modules\Employee\Transformers\EmployeeHoliday\EmployeeHolidayResourceEnums;
use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;


class EmployeeHolidayController extends Controller
{
    use ApiResponseTrait;
    public $pageName= 'home1';

    protected $EmployeeHolidayRepository;

    public function __construct(EmployeeHolidayRepositoryInterface $EmployeeHolidayRepository)
    {
        $this->EmployeeHolidayRepository = $EmployeeHolidayRepository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new EmployeeHolidayResourceEnums([]),'EmployeeHoliday enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->EmployeeHolidayRepository->all(), 'employeeholiday', EmployeeHolidayResource::class),
         'EmployeeHoliday list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->EmployeeHolidayRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EmployeeHoliday not found', 404);
        }
        return $this->successResponse(new EmployeeHolidayResource($data), 'EmployeeHoliday retrieved successfully');
    }

    public function store(EmployeeHolidayStoreRequest $request, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeHolidayRepository->create($validated);
        $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }

        return $this->successResponse(new EmployeeHolidayResource($record), 'EmployeeHoliday created successfully', 201);
    }

    public function update(EmployeeHolidayUpdateRequest $request, $id, AttachmentService $service,EmployeeCompletionService $percentageService)
    {
        $validated = $request->validated();
        $files = $request->file('files') ?? [];
        unset($validated['files']);

        $record = $this->EmployeeHolidayRepository->update($id, $validated);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Employee'));
        }
    $completion = $percentageService->syncCompletion($validated,$request,$this->pageName);


        return $this->successResponse(new EmployeeHolidayResource($record), 'EmployeeHoliday updated successfully');
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

        $deletedCount = $this->EmployeeHolidayRepository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} EmployeeHoliday deleted successfully");
    }
}
