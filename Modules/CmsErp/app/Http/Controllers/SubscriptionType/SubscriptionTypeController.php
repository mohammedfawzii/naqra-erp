<?php

namespace Modules\CmsErp\Http\Controllers\SubscriptionType;

use Modules\CmsErp\Repositories\SubscriptionType\SubscriptionTypeRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;

use Modules\CmsErp\Http\Requests\SubscriptionType\SubscriptionTypeStoreRequest;
use Modules\CmsErp\Http\Requests\SubscriptionType\SubscriptionTypeUpdateRequest;
use Modules\CmsErp\Transformers\SubscriptionType\SubscriptionTypeResource;

class SubscriptionTypeController extends Controller
{
    use ApiResponseTrait;

    protected $SubscriptionTypeRepository;

    public function __construct(SubscriptionTypeRepositoryInterface $SubscriptionTypeRepository)
    {
        $this->SubscriptionTypeRepository = $SubscriptionTypeRepository;
    }

    public function index()
    {
        $data = $this->SubscriptionTypeRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'subscriptiontype', SubscriptionTypeResource::class),
                    'SubscriptionType list retrieved successfully'
                );
        
        }

    public function show($id)
    {
        $data = $this->SubscriptionTypeRepository->find($id);
        if (!$data) {
            return $this->errorResponse('SubscriptionType not found', 404);
        }
        return $this->successResponse(new SubscriptionTypeResource($data), 'SubscriptionType retrieved successfully');
    }

    public function store(SubscriptionTypeStoreRequest $request)
    {
        $data = $this->SubscriptionTypeRepository->create($request->validated());
        return $this->successResponse(new SubscriptionTypeResource($data), 'SubscriptionType created successfully', 201);
    }

    public function update(SubscriptionTypeUpdateRequest $request, $id)
    {
        $data = $this->SubscriptionTypeRepository->update($id, $request->validated());
        return $this->successResponse(new SubscriptionTypeResource($data), 'SubscriptionType updated successfully');
    }

    public function destroy($id)
    {
        $this->SubscriptionTypeRepository->delete($id);
        return $this->successResponse(null, 'SubscriptionType deleted successfully');
    }
}
