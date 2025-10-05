<?php

namespace Modules\AttendanceTracking\Http\Controllers\EmployeeLeaveSelfService;

use Modules\AttendanceTracking\Repositories\EmployeeLeaveSelfService\EmployeeLeaveSelfServiceRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\AttendanceTracking\Transformers\BaseCollection\BaseCollection;

use Modules\AttendanceTracking\Http\Requests\EmployeeLeaveSelfService\EmployeeLeaveSelfServiceStoreRequest;
use Modules\AttendanceTracking\Http\Requests\EmployeeLeaveSelfService\EmployeeLeaveSelfServiceUpdateRequest;
use Modules\AttendanceTracking\Transformers\EmployeeLeaveSelfService\EmployeeLeaveSelfServiceResource;

class EmployeeLeaveSelfServiceController extends Controller
{
    use ApiResponseTrait;

    protected $EmployeeLeaveSelfServiceRepository;

    public function __construct(EmployeeLeaveSelfServiceRepositoryInterface $EmployeeLeaveSelfServiceRepository)
    {
        $this->EmployeeLeaveSelfServiceRepository = $EmployeeLeaveSelfServiceRepository;
    }

    public function index()
    {
        $data = $this->EmployeeLeaveSelfServiceRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'employeeleaveselfservice', EmployeeLeaveSelfServiceResource::class),
                    'EmployeeLeaveSelfService list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->EmployeeLeaveSelfServiceRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EmployeeLeaveSelfService not found', 404);
        }
        return $this->successResponse(new EmployeeLeaveSelfServiceResource($data), 'EmployeeLeaveSelfService retrieved successfully');
    }

    public function store(EmployeeLeaveSelfServiceStoreRequest $request)
    {
        $data = $this->EmployeeLeaveSelfServiceRepository->create($request->validated());
        return $this->successResponse(new EmployeeLeaveSelfServiceResource($data), 'EmployeeLeaveSelfService created successfully', 201);
    }

    public function update(EmployeeLeaveSelfServiceUpdateRequest $request, $id)
    {
        $data = $this->EmployeeLeaveSelfServiceRepository->update($id, $request->validated());
        return $this->successResponse(new EmployeeLeaveSelfServiceResource($data), 'EmployeeLeaveSelfService updated successfully');
    }

    public function destroy($id)
    {
        $this->EmployeeLeaveSelfServiceRepository->delete($id);
        return $this->successResponse(null, 'EmployeeLeaveSelfService deleted successfully');
    }
}
