<?php

namespace Modules\CmsErp\Http\Controllers\Currency;

use Modules\CmsErp\Repositories\Currency\CurrencyRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\Currency\CurrencyStoreRequest;
use Modules\CmsErp\Http\Requests\Currency\CurrencyUpdateRequest;
use Modules\CmsErp\Transformers\Currency\CurrencyResource;

class CurrencyController extends Controller
{
    use ApiResponseTrait;

    protected $CurrencyRepository;

    public function __construct(CurrencyRepositoryInterface $CurrencyRepository)
    {
        $this->CurrencyRepository = $CurrencyRepository;
    }

    public function index()
    {
        $data = $this->CurrencyRepository->all();
        return $this->successResponse(CurrencyResource::collection($data), 'Currency list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->CurrencyRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Currency not found', 404);
        }
        return $this->successResponse(new CurrencyResource($data), 'Currency retrieved successfully');
    }

    public function store(CurrencyStoreRequest $request)
    {
        $data = $this->CurrencyRepository->create($request->validated());
        return $this->successResponse(new CurrencyResource($data), 'Currency created successfully', 201);
    }

    public function update(CurrencyUpdateRequest $request, $id)
    {
        $data = $this->CurrencyRepository->update($id, $request->validated());
        return $this->successResponse(new CurrencyResource($data), 'Currency updated successfully');
    }

    public function destroy($id)
    {
        $this->CurrencyRepository->delete($id);
        return $this->successResponse(null, 'Currency deleted successfully');
    }
}
