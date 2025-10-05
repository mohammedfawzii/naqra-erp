<?php

namespace Modules\Payroll\Http\Controllers\PayrollProfile;

use Modules\Payroll\Repositories\PayrollProfile\PayrollProfileRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\PayrollProfile\PayrollProfileStoreRequest;
use Modules\Payroll\Http\Requests\PayrollProfile\PayrollProfileUpdateRequest;
use Modules\Payroll\Transformers\PayrollProfile\PayrollProfileResource;

class PayrollProfileController extends Controller
{
    use ApiResponseTrait;

    protected $PayrollProfileRepository;

    public function __construct(PayrollProfileRepositoryInterface $PayrollProfileRepository)
    {
        $this->PayrollProfileRepository = $PayrollProfileRepository;
    }

    public function index()
    {
        $data = $this->PayrollProfileRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'payrollprofile', PayrollProfileResource::class),
                    'PayrollProfile list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->PayrollProfileRepository->find($id);
        if (!$data) {
            return $this->errorResponse('PayrollProfile not found', 404);
        }
        return $this->successResponse(new PayrollProfileResource($data), 'PayrollProfile retrieved successfully');
    }

    public function store(PayrollProfileStoreRequest $request)
    {
        $data = $this->PayrollProfileRepository->create($request->validated());
        return $this->successResponse(new PayrollProfileResource($data), 'PayrollProfile created successfully', 201);
    }

    public function update(PayrollProfileUpdateRequest $request, $id)
    {
        $data = $this->PayrollProfileRepository->update($id, $request->validated());
        return $this->successResponse(new PayrollProfileResource($data), 'PayrollProfile updated successfully');
    }

    public function destroy($id)
    {
        $this->PayrollProfileRepository->delete($id);
        return $this->successResponse(null, 'PayrollProfile deleted successfully');
    }
}
