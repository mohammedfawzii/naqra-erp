<?php

namespace Modules\AttendanceTracking\Http\Controllers\AttendanceCompliance;

use Modules\AttendanceTracking\Repositories\AttendanceCompliance\AttendanceComplianceRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\AttendanceTracking\Transformers\BaseCollection\BaseCollection;

use Modules\AttendanceTracking\Http\Requests\AttendanceCompliance\AttendanceComplianceStoreRequest;
use Modules\AttendanceTracking\Http\Requests\AttendanceCompliance\AttendanceComplianceUpdateRequest;
use Modules\AttendanceTracking\Transformers\AttendanceCompliance\AttendanceComplianceResource;

class AttendanceComplianceController extends Controller
{
    use ApiResponseTrait;

    protected $AttendanceComplianceRepository;

    public function __construct(AttendanceComplianceRepositoryInterface $AttendanceComplianceRepository)
    {
        $this->AttendanceComplianceRepository = $AttendanceComplianceRepository;
    }

    public function index()
    {
        $data = $this->AttendanceComplianceRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'attendancecompliance', AttendanceComplianceResource::class),
                    'AttendanceCompliance list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->AttendanceComplianceRepository->find($id);
        if (!$data) {
            return $this->errorResponse('AttendanceCompliance not found', 404);
        }
        return $this->successResponse(new AttendanceComplianceResource($data), 'AttendanceCompliance retrieved successfully');
    }

    public function store(AttendanceComplianceStoreRequest $request)
    {
        $data = $this->AttendanceComplianceRepository->create($request->validated());
        return $this->successResponse(new AttendanceComplianceResource($data), 'AttendanceCompliance created successfully', 201);
    }

    public function update(AttendanceComplianceUpdateRequest $request, $id)
    {
        $data = $this->AttendanceComplianceRepository->update($id, $request->validated());
        return $this->successResponse(new AttendanceComplianceResource($data), 'AttendanceCompliance updated successfully');
    }

    public function destroy($id)
    {
        $this->AttendanceComplianceRepository->delete($id);
        return $this->successResponse(null, 'AttendanceCompliance deleted successfully');
    }
}
