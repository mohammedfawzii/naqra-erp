<?php

namespace Modules\Payroll\Http\Controllers\PayrollReport;

use Modules\Payroll\Repositories\PayrollReport\PayrollReportRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\PayrollReport\PayrollReportStoreRequest;
use Modules\Payroll\Http\Requests\PayrollReport\PayrollReportUpdateRequest;
use Modules\Payroll\Transformers\PayrollReport\PayrollReportResource;

class PayrollReportController extends Controller
{
    use ApiResponseTrait;

    protected $PayrollReportRepository;

    public function __construct(PayrollReportRepositoryInterface $PayrollReportRepository)
    {
        $this->PayrollReportRepository = $PayrollReportRepository;
    }

    public function index()
    {
        $data = $this->PayrollReportRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'payrollreport', PayrollReportResource::class),
                    'PayrollReport list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->PayrollReportRepository->find($id);
        if (!$data) {
            return $this->errorResponse('PayrollReport not found', 404);
        }
        return $this->successResponse(new PayrollReportResource($data), 'PayrollReport retrieved successfully');
    }

    public function store(PayrollReportStoreRequest $request)
    {
        $data = $this->PayrollReportRepository->create($request->validated());
        return $this->successResponse(new PayrollReportResource($data), 'PayrollReport created successfully', 201);
    }

    public function update(PayrollReportUpdateRequest $request, $id)
    {
        $data = $this->PayrollReportRepository->update($id, $request->validated());
        return $this->successResponse(new PayrollReportResource($data), 'PayrollReport updated successfully');
    }

    public function destroy($id)
    {
        $this->PayrollReportRepository->delete($id);
        return $this->successResponse(null, 'PayrollReport deleted successfully');
    }
}
