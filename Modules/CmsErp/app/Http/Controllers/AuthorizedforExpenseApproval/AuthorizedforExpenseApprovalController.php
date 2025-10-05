<?php

namespace Modules\CmsErp\Http\Controllers\AuthorizedforExpenseApproval;

use Modules\CmsErp\Repositories\AuthorizedforExpenseApproval\AuthorizedforExpenseApprovalRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\AuthorizedforExpenseApproval\AuthorizedforExpenseApprovalStoreRequest;
use Modules\CmsErp\Http\Requests\AuthorizedforExpenseApproval\AuthorizedforExpenseApprovalUpdateRequest;
use Modules\CmsErp\Transformers\AuthorizedforExpenseApproval\AuthorizedforExpenseApprovalResource;

class AuthorizedforExpenseApprovalController extends Controller
{
    use ApiResponseTrait;

    protected $AuthorizedforExpenseApprovalRepository;

    public function __construct(AuthorizedforExpenseApprovalRepositoryInterface $AuthorizedforExpenseApprovalRepository)
    {
        $this->AuthorizedforExpenseApprovalRepository = $AuthorizedforExpenseApprovalRepository;
    }

    public function index()
    {
        $data = $this->AuthorizedforExpenseApprovalRepository->all();
        return $this->successResponse(AuthorizedforExpenseApprovalResource::collection($data), 'AuthorizedforExpenseApproval list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->AuthorizedforExpenseApprovalRepository->find($id);
        if (!$data) {
            return $this->errorResponse('AuthorizedforExpenseApproval not found', 404);
        }
        return $this->successResponse(new AuthorizedforExpenseApprovalResource($data), 'AuthorizedforExpenseApproval retrieved successfully');
    }

    public function store(AuthorizedforExpenseApprovalStoreRequest $request)
    {
        $data = $this->AuthorizedforExpenseApprovalRepository->create($request->validated());
        return $this->successResponse(new AuthorizedforExpenseApprovalResource($data), 'AuthorizedforExpenseApproval created successfully', 201);
    }

    public function update(AuthorizedforExpenseApprovalUpdateRequest $request, $id)
    {
        $data = $this->AuthorizedforExpenseApprovalRepository->update($id, $request->validated());
        return $this->successResponse(new AuthorizedforExpenseApprovalResource($data), 'AuthorizedforExpenseApproval updated successfully');
    }

    public function destroy($id)
    {
        $this->AuthorizedforExpenseApprovalRepository->delete($id);
        return $this->successResponse(null, 'AuthorizedforExpenseApproval deleted successfully');
    }
}
