<?php

namespace Modules\Facilities\Http\Controllers\Branches;

use Modules\Facilities\Repositories\Branches\BranchesRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;

use Modules\Facilities\Http\Requests\Branches\BranchesStoreRequest;
use Modules\Facilities\Http\Requests\Branches\BranchesUpdateRequest;
use Modules\Facilities\Transformers\Branches\BranchesResource;

class BranchesController extends Controller
{
    use ApiResponseTrait;

    protected $BranchesRepository;

    public function __construct(BranchesRepositoryInterface $BranchesRepository)
    {
        $this->BranchesRepository = $BranchesRepository;
    }

    public function index()
    {
        $data = $this->BranchesRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'branches', BranchesResource::class),
                    'Branches list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->BranchesRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Branches not found', 404);
        }
        return $this->successResponse(new BranchesResource($data), 'Branches retrieved successfully');
    }

    public function store(BranchesStoreRequest $request)
    {
        $data = $this->BranchesRepository->create($request->validated());
        return $this->successResponse(new BranchesResource($data), 'Branches created successfully', 201);
    }

    public function update(BranchesUpdateRequest $request, $id)
    {
        $data = $this->BranchesRepository->update($id, $request->validated());
        return $this->successResponse(new BranchesResource($data), 'Branches updated successfully');
    }

    public function destroy($id)
    {
        $this->BranchesRepository->delete($id);
        return $this->successResponse(null, 'Branches deleted successfully');
    }
}
