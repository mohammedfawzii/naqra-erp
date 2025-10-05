<?php

namespace Modules\Payroll\Http\Controllers\ChatbotforPayroll;

use Modules\Payroll\Repositories\ChatbotforPayroll\ChatbotforPayrollRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\ChatbotforPayroll\ChatbotforPayrollStoreRequest;
use Modules\Payroll\Http\Requests\ChatbotforPayroll\ChatbotforPayrollUpdateRequest;
use Modules\Payroll\Transformers\ChatbotforPayroll\ChatbotforPayrollResource;

class ChatbotforPayrollController extends Controller
{
    use ApiResponseTrait;

    protected $ChatbotforPayrollRepository;

    public function __construct(ChatbotforPayrollRepositoryInterface $ChatbotforPayrollRepository)
    {
        $this->ChatbotforPayrollRepository = $ChatbotforPayrollRepository;
    }

    public function index()
    {
        $data = $this->ChatbotforPayrollRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'chatbotforpayroll', ChatbotforPayrollResource::class),
                    'ChatbotforPayroll list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->ChatbotforPayrollRepository->find($id);
        if (!$data) {
            return $this->errorResponse('ChatbotforPayroll not found', 404);
        }
        return $this->successResponse(new ChatbotforPayrollResource($data), 'ChatbotforPayroll retrieved successfully');
    }

    public function store(ChatbotforPayrollStoreRequest $request)
    {
        $data = $this->ChatbotforPayrollRepository->create($request->validated());
        return $this->successResponse(new ChatbotforPayrollResource($data), 'ChatbotforPayroll created successfully', 201);
    }

    public function update(ChatbotforPayrollUpdateRequest $request, $id)
    {
        $data = $this->ChatbotforPayrollRepository->update($id, $request->validated());
        return $this->successResponse(new ChatbotforPayrollResource($data), 'ChatbotforPayroll updated successfully');
    }

    public function destroy($id)
    {
        $this->ChatbotforPayrollRepository->delete($id);
        return $this->successResponse(null, 'ChatbotforPayroll deleted successfully');
    }
}
