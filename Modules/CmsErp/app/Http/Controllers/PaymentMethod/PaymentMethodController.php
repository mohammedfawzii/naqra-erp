<?php

namespace Modules\CmsErp\Http\Controllers\PaymentMethod;

use Modules\CmsErp\Repositories\PaymentMethod\PaymentMethodRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;

use Modules\CmsErp\Http\Requests\PaymentMethod\PaymentMethodStoreRequest;
use Modules\CmsErp\Http\Requests\PaymentMethod\PaymentMethodUpdateRequest;
use Modules\CmsErp\Transformers\PaymentMethod\PaymentMethodResource;

class PaymentMethodController extends Controller
{
    use ApiResponseTrait;

    protected $PaymentMethodRepository;

    public function __construct(PaymentMethodRepositoryInterface $PaymentMethodRepository)
    {
        $this->PaymentMethodRepository = $PaymentMethodRepository;
    }

    public function index()
    {
        $data = $this->PaymentMethodRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'paymentmethod', PaymentMethodResource::class),
                    'PaymentMethod list retrieved successfully'
                );
        
        }

    public function show($id)
    {
        $data = $this->PaymentMethodRepository->find($id);
        if (!$data) {
            return $this->errorResponse('PaymentMethod not found', 404);
        }
        return $this->successResponse(new PaymentMethodResource($data), 'PaymentMethod retrieved successfully');
    }

    public function store(PaymentMethodStoreRequest $request)
    {
        $data = $this->PaymentMethodRepository->create($request->validated());
        return $this->successResponse(new PaymentMethodResource($data), 'PaymentMethod created successfully', 201);
    }

    public function update(PaymentMethodUpdateRequest $request, $id)
    {
        $data = $this->PaymentMethodRepository->update($id, $request->validated());
        return $this->successResponse(new PaymentMethodResource($data), 'PaymentMethod updated successfully');
    }

    public function destroy($id)
    {
        $this->PaymentMethodRepository->delete($id);
        return $this->successResponse(null, 'PaymentMethod deleted successfully');
    }
}
