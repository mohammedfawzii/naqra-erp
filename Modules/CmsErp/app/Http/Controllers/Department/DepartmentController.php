<?php

namespace Modules\CmsErp\Http\Controllers\Department;

use Modules\CmsErp\Repositories\Department\DepartmentRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\CmsErp\Transformers\BaseCollection\BaseCollection;

use Modules\CmsErp\Http\Requests\Department\DepartmentStoreRequest;
use Modules\CmsErp\Http\Requests\Department\DepartmentUpdateRequest;
use Modules\CmsErp\Transformers\Department\DepartmentResource;

class DepartmentController extends Controller
{
    use ApiResponseTrait;

    protected $DepartmentRepository;

    public function __construct(DepartmentRepositoryInterface $DepartmentRepository)
    {
        $this->DepartmentRepository = $DepartmentRepository;
    }

    public function index()
    {
        $data = $this->DepartmentRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'department', DepartmentResource::class),
                    'Department list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->DepartmentRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Department not found', 404);
        }
        return $this->successResponse(new DepartmentResource($data), 'Department retrieved successfully');
    }

    public function store(DepartmentStoreRequest $request)
    {
        $data = $this->DepartmentRepository->create($request->validated());
        return $this->successResponse(new DepartmentResource($data), 'Department created successfully', 201);
    }

    public function update(DepartmentUpdateRequest $request, $id)
    {
        $data = $this->DepartmentRepository->update($id, $request->validated());
        return $this->successResponse(new DepartmentResource($data), 'Department updated successfully');
    }

    public function destroy($id)
    {
        $this->DepartmentRepository->delete($id);
        return $this->successResponse(null, 'Department deleted successfully');
    }
}
