<?php

namespace Modules\CmsErp\Http\Controllers\Subscription;

use Modules\CmsErp\Repositories\Subscription\SubscriptionRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\Subscription\SubscriptionStoreRequest;
use Modules\CmsErp\Http\Requests\Subscription\SubscriptionUpdateRequest;
use Modules\CmsErp\Transformers\Subscription\SubscriptionResource;

class SubscriptionController extends Controller
{
    use ApiResponseTrait;

    protected $SubscriptionRepository;

    public function __construct(SubscriptionRepositoryInterface $SubscriptionRepository)
    {
        $this->SubscriptionRepository = $SubscriptionRepository;
    }

    public function index()
    {
        $data = $this->SubscriptionRepository->all();
        return $this->successResponse(SubscriptionResource::collection($data), 'Subscription list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->SubscriptionRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Subscription not found', 404);
        }
        return $this->successResponse(new SubscriptionResource($data), 'Subscription retrieved successfully');
    }

    public function store(SubscriptionStoreRequest $request)
    {
        $data = $this->SubscriptionRepository->create($request->validated());
        return $this->successResponse(new SubscriptionResource($data), 'Subscription created successfully', 201);
    }

    public function update(SubscriptionUpdateRequest $request, $id)
    {
        $data = $this->SubscriptionRepository->update($id, $request->validated());
        return $this->successResponse(new SubscriptionResource($data), 'Subscription updated successfully');
    }

    public function destroy($id)
    {
        $this->SubscriptionRepository->delete($id);
        return $this->successResponse(null, 'Subscription deleted successfully');
    }
}
