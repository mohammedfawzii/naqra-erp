<?php

namespace Modules\CmsErp\Http\Controllers\Headquarter;

use Modules\CmsErp\Repositories\Headquarter\HeadquarterRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\Headquarter\HeadquarterStoreRequest;
use Modules\CmsErp\Http\Requests\Headquarter\HeadquarterUpdateRequest;
use Modules\CmsErp\Transformers\Headquarter\HeadquarterResource;

class HeadquarterController extends Controller
{
    use ApiResponseTrait;

    protected $HeadquarterRepository;

    public function __construct(HeadquarterRepositoryInterface $HeadquarterRepository)
    {
        $this->HeadquarterRepository = $HeadquarterRepository;
    }

    public function index()
    {
        $data = $this->HeadquarterRepository->all();
        return $this->successResponse(HeadquarterResource::collection($data), 'Headquarter list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->HeadquarterRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Headquarter not found', 404);
        }
        return $this->successResponse(new HeadquarterResource($data), 'Headquarter retrieved successfully');
    }

    public function store(HeadquarterStoreRequest $request)
    {
        $data = $this->HeadquarterRepository->create($request->validated());
        return $this->successResponse(new HeadquarterResource($data), 'Headquarter created successfully', 201);
    }

    public function update(HeadquarterUpdateRequest $request, $id)
    {
        $data = $this->HeadquarterRepository->update($id, $request->validated());
        return $this->successResponse(new HeadquarterResource($data), 'Headquarter updated successfully');
    }

    public function destroy($id)
    {
        $this->HeadquarterRepository->delete($id);
        return $this->successResponse(null, 'Headquarter deleted successfully');
    }
}
