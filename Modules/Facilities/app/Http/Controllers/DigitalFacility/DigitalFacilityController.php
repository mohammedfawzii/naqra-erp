<?php

namespace Modules\Facilities\Http\Controllers\DigitalFacility;

use Modules\Facilities\Repositories\DigitalFacility\DigitalFacilityRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;

use Modules\Facilities\Http\Requests\DigitalFacility\DigitalFacilityStoreRequest;
use Modules\Facilities\Http\Requests\DigitalFacility\DigitalFacilityUpdateRequest;
use Modules\Facilities\Transformers\DigitalFacility\DigitalFacilityResource;

class DigitalFacilityController extends Controller
{
    use ApiResponseTrait;

    protected $DigitalFacilityRepository;

    public function __construct(DigitalFacilityRepositoryInterface $DigitalFacilityRepository)
    {
        $this->DigitalFacilityRepository = $DigitalFacilityRepository;
    }

    public function index()
    {
        $data = $this->DigitalFacilityRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'digitalfacility', DigitalFacilityResource::class),
                    'DigitalFacility list retrieved successfully'
                );
        
        }

    public function show($id)
    {
        $data = $this->DigitalFacilityRepository->find($id);
        if (!$data) {
            return $this->errorResponse('DigitalFacility not found', 404);
        }
        return $this->successResponse(new DigitalFacilityResource($data), 'DigitalFacility retrieved successfully');
    }

    public function store(DigitalFacilityStoreRequest $request)
    {
        $data = $this->DigitalFacilityRepository->create($request->validated());
        return $this->successResponse(new DigitalFacilityResource($data), 'DigitalFacility created successfully', 201);
    }

    public function update(DigitalFacilityUpdateRequest $request, $id)
    {
        $data = $this->DigitalFacilityRepository->update($id, $request->validated());
        return $this->successResponse(new DigitalFacilityResource($data), 'DigitalFacility updated successfully');
    }

    public function destroy($id)
    {
        $this->DigitalFacilityRepository->delete($id);
        return $this->successResponse(null, 'DigitalFacility deleted successfully');
    }
}
