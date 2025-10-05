<?php

namespace Modules\Facilities\Http\Controllers\Facilities;

use Modules\Facilities\Repositories\Facilities\FacilitiesRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;

use Modules\Facilities\Http\Requests\Facilities\FacilitiesStoreRequest;
use Modules\Facilities\Http\Requests\Facilities\FacilitiesUpdateRequest;
use Modules\Facilities\Transformers\Facilities\FacilitiesResource;

class FacilitiesController extends Controller
{
    use ApiResponseTrait;

    protected $FacilitiesRepository;

    public function __construct(FacilitiesRepositoryInterface $FacilitiesRepository)
    {
        $this->FacilitiesRepository = $FacilitiesRepository;
    }

    public function index()
    {
        $data = $this->FacilitiesRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'facilities', FacilitiesResource::class),
                    'Facilities list retrieved successfully'
                );
        
        }

    public function show($id)
    {
        $data = $this->FacilitiesRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Facilities not found', 404);
        }
        return $this->successResponse(new FacilitiesResource($data), 'Facilities retrieved successfully');
    }

    public function store(FacilitiesStoreRequest $request)
    {
        $data = $this->FacilitiesRepository->create($request->validated());
        return $this->successResponse(new FacilitiesResource($data), 'Facilities created successfully', 201);
    }

    public function update(FacilitiesUpdateRequest $request, $id)
    {
        $data = $this->FacilitiesRepository->update($id, $request->validated());
        return $this->successResponse(new FacilitiesResource($data), 'Facilities updated successfully');
    }

    public function destroy($id)
    {
        $this->FacilitiesRepository->delete($id);
        return $this->successResponse(null, 'Facilities deleted successfully');
    }
}
