<?php

namespace Modules\Payroll\Http\Controllers\PayrollAnalytics;

use Modules\Payroll\Repositories\PayrollAnalytics\PayrollAnalyticsRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\PayrollAnalytics\PayrollAnalyticsStoreRequest;
use Modules\Payroll\Http\Requests\PayrollAnalytics\PayrollAnalyticsUpdateRequest;
use Modules\Payroll\Transformers\PayrollAnalytics\PayrollAnalyticsResource;

class PayrollAnalyticsController extends Controller
{
    use ApiResponseTrait;

    protected $PayrollAnalyticsRepository;

    public function __construct(PayrollAnalyticsRepositoryInterface $PayrollAnalyticsRepository)
    {
        $this->PayrollAnalyticsRepository = $PayrollAnalyticsRepository;
    }

    public function index()
    {
        $data = $this->PayrollAnalyticsRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'payrollanalytics', PayrollAnalyticsResource::class),
                    'PayrollAnalytics list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->PayrollAnalyticsRepository->find($id);
        if (!$data) {
            return $this->errorResponse('PayrollAnalytics not found', 404);
        }
        return $this->successResponse(new PayrollAnalyticsResource($data), 'PayrollAnalytics retrieved successfully');
    }

    public function store(PayrollAnalyticsStoreRequest $request)
    {
        $data = $this->PayrollAnalyticsRepository->create($request->validated());
        return $this->successResponse(new PayrollAnalyticsResource($data), 'PayrollAnalytics created successfully', 201);
    }

    public function update(PayrollAnalyticsUpdateRequest $request, $id)
    {
        $data = $this->PayrollAnalyticsRepository->update($id, $request->validated());
        return $this->successResponse(new PayrollAnalyticsResource($data), 'PayrollAnalytics updated successfully');
    }

    public function destroy($id)
    {
        $this->PayrollAnalyticsRepository->delete($id);
        return $this->successResponse(null, 'PayrollAnalytics deleted successfully');
    }
}
