<?php

namespace Modules\Payroll\Http\Controllers\Payroll;

use Modules\Payroll\Repositories\Payroll\PayrollRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\Payroll\PayrollStoreRequest;
use Modules\Payroll\Http\Requests\Payroll\PayrollUpdateRequest;
use Modules\Payroll\Transformers\Payroll\PayrollResource;

class PayrollController extends Controller
{
    use ApiResponseTrait;

    protected $PayrollRepository;

    public function __construct(PayrollRepositoryInterface $PayrollRepository)
    {
        $this->PayrollRepository = $PayrollRepository;
    }

    public function index()
    {
        $data = $this->PayrollRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'payroll', PayrollResource::class),
                    'Payroll list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->PayrollRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Payroll not found', 404);
        }
        return $this->successResponse(new PayrollResource($data), 'Payroll retrieved successfully');
    }

    public function store(PayrollStoreRequest $request)
    {
        // return $request;
        $data = $this->PayrollRepository->create($request->validated());
        return $this->successResponse(new PayrollResource($data), 'Payroll created successfully', 201);
    }

    public function update(PayrollUpdateRequest $request, $id)
    {
        $data = $this->PayrollRepository->update($id, $request->validated());
        return $this->successResponse(new PayrollResource($data), 'Payroll updated successfully');
    }

    public function destroy(Request $request, $id)
    {
         $this->PayrollRepository->delete($id);
        return $this->successResponse(null, 'Payroll deleted successfully');
    }
}
