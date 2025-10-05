<?php

namespace Modules\CmsErp\Http\Controllers\EmployeeStatu;

use Modules\CmsErp\Repositories\EmployeeStatu\EmployeeStatuRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\EmployeeStatu\EmployeeStatuStoreRequest;
use Modules\CmsErp\Http\Requests\EmployeeStatu\EmployeeStatuUpdateRequest;
use Modules\CmsErp\Transformers\EmployeeStatu\EmployeeStatuResource;

class EmployeeStatuController extends Controller
{
    use ApiResponseTrait;

    protected $EmployeeStatuRepository;

    public function __construct(EmployeeStatuRepositoryInterface $EmployeeStatuRepository)
    {
        $this->EmployeeStatuRepository = $EmployeeStatuRepository;
    }

    public function index()
    {
        $data = $this->EmployeeStatuRepository->all();
        return $this->successResponse(EmployeeStatuResource::collection($data), 'EmployeeStatu list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->EmployeeStatuRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EmployeeStatu not found', 404);
        }
        return $this->successResponse(new EmployeeStatuResource($data), 'EmployeeStatu retrieved successfully');
    }

    public function store(EmployeeStatuStoreRequest $request)
    {
        $data = $this->EmployeeStatuRepository->create($request->validated());
        return $this->successResponse(new EmployeeStatuResource($data), 'EmployeeStatu created successfully', 201);
    }

    public function update(EmployeeStatuUpdateRequest $request, $id)
    {
        $data = $this->EmployeeStatuRepository->update($id, $request->validated());
        return $this->successResponse(new EmployeeStatuResource($data), 'EmployeeStatu updated successfully');
    }

    public function destroy($id)
    {
        $this->EmployeeStatuRepository->delete($id);
        return $this->successResponse(null, 'EmployeeStatu deleted successfully');
    }
}
