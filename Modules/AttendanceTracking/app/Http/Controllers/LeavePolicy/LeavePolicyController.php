<?php

namespace Modules\AttendanceTracking\Http\Controllers\LeavePolicy;

use Modules\AttendanceTracking\Repositories\LeavePolicy\LeavePolicyRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\AttendanceTracking\Transformers\BaseCollection\BaseCollection;

use Modules\AttendanceTracking\Http\Requests\LeavePolicy\LeavePolicyStoreRequest;
use Modules\AttendanceTracking\Http\Requests\LeavePolicy\LeavePolicyUpdateRequest;
use Modules\AttendanceTracking\Transformers\LeavePolicy\LeavePolicyResource;

class LeavePolicyController extends Controller
{
    use ApiResponseTrait;

    protected $LeavePolicyRepository;

    public function __construct(LeavePolicyRepositoryInterface $LeavePolicyRepository)
    {
        $this->LeavePolicyRepository = $LeavePolicyRepository;
    }

    public function index()
    {
        $data = $this->LeavePolicyRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'leavepolicy', LeavePolicyResource::class),
                    'LeavePolicy list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->LeavePolicyRepository->find($id);
        if (!$data) {
            return $this->errorResponse('LeavePolicy not found', 404);
        }
        return $this->successResponse(new LeavePolicyResource($data), 'LeavePolicy retrieved successfully');
    }

    public function store(LeavePolicyStoreRequest $request)
    {
        $data = $this->LeavePolicyRepository->create($request->validated());
        return $this->successResponse(new LeavePolicyResource($data), 'LeavePolicy created successfully', 201);
    }

    public function update(LeavePolicyUpdateRequest $request, $id)
    {
        $data = $this->LeavePolicyRepository->update($id, $request->validated());
        return $this->successResponse(new LeavePolicyResource($data), 'LeavePolicy updated successfully');
    }

    public function destroy($id)
    {
        $this->LeavePolicyRepository->delete($id);
        return $this->successResponse(null, 'LeavePolicy deleted successfully');
    }
}
