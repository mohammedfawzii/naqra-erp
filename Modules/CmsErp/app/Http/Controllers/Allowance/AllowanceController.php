<?php

namespace Modules\CmsErp\Http\Controllers\Allowance;

use Modules\CmsErp\Repositories\Allowance\AllowanceRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\Allowance\AllowanceStoreRequest;
use Modules\CmsErp\Http\Requests\Allowance\AllowanceUpdateRequest;
use Modules\CmsErp\Transformers\Allowance\AllowanceResource;

class AllowanceController extends Controller
{
    use ApiResponseTrait;

    protected $AllowanceRepository;

    public function __construct(AllowanceRepositoryInterface $AllowanceRepository)
    {
        $this->AllowanceRepository = $AllowanceRepository;
    }

    public function index()
    {
        $data = $this->AllowanceRepository->all();
        return $this->successResponse(AllowanceResource::collection($data), 'Allowance list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->AllowanceRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Allowance not found', 404);
        }
        return $this->successResponse(new AllowanceResource($data), 'Allowance retrieved successfully');
    }

    public function store(AllowanceStoreRequest $request)
    {
        $data = $this->AllowanceRepository->create($request->validated());
        return $this->successResponse(new AllowanceResource($data), 'Allowance created successfully', 201);
    }

    public function update(AllowanceUpdateRequest $request, $id)
    {
        $data = $this->AllowanceRepository->update($id, $request->validated());
        return $this->successResponse(new AllowanceResource($data), 'Allowance updated successfully');
    }

    public function destroy($id)
    {
        $this->AllowanceRepository->delete($id);
        return $this->successResponse(null, 'Allowance deleted successfully');
    }
}
