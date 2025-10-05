<?php

namespace Modules\Facilities\Http\Controllers\SubscriptionFacilities;

use Modules\Facilities\Repositories\SubscriptionFacilities\SubscriptionFacilitiesRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;

use Modules\Facilities\Http\Requests\SubscriptionFacilities\SubscriptionFacilitiesStoreRequest;
use Modules\Facilities\Http\Requests\SubscriptionFacilities\SubscriptionFacilitiesUpdateRequest;
use Modules\Facilities\Transformers\SubscriptionFacilities\SubscriptionFacilitiesResource;

class SubscriptionFacilitiesController extends Controller
{
    use ApiResponseTrait;

    protected $SubscriptionFacilitiesRepository;

    public function __construct(SubscriptionFacilitiesRepositoryInterface $SubscriptionFacilitiesRepository)
    {
        $this->SubscriptionFacilitiesRepository = $SubscriptionFacilitiesRepository;
    }

    public function index()
    {
        $data = $this->SubscriptionFacilitiesRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'subscriptionfacilities', SubscriptionFacilitiesResource::class),
                    'SubscriptionFacilities list retrieved successfully'
                );
        
        }

    public function show($id)
    {
        $data = $this->SubscriptionFacilitiesRepository->find($id);
        if (!$data) {
            return $this->errorResponse('SubscriptionFacilities not found', 404);
        }
        return $this->successResponse(new SubscriptionFacilitiesResource($data), 'SubscriptionFacilities retrieved successfully');
    }

    public function store(SubscriptionFacilitiesStoreRequest $request)
    {
        $data = $this->SubscriptionFacilitiesRepository->create($request->validated());
        return $this->successResponse(new SubscriptionFacilitiesResource($data), 'SubscriptionFacilities created successfully', 201);
    }

    public function update(SubscriptionFacilitiesUpdateRequest $request, $id)
    {
        $data = $this->SubscriptionFacilitiesRepository->update($id, $request->validated());
        return $this->successResponse(new SubscriptionFacilitiesResource($data), 'SubscriptionFacilities updated successfully');
    }

    public function destroy($id)
    {
        $this->SubscriptionFacilitiesRepository->delete($id);
        return $this->successResponse(null, 'SubscriptionFacilities deleted successfully');
    }
}
