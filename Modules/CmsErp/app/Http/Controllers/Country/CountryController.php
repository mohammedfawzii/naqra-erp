<?php

namespace Modules\CmsErp\Http\Controllers\Country;

use Modules\CmsErp\Repositories\Country\CountryRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\Country\CountryStoreRequest;
use Modules\CmsErp\Http\Requests\Country\CountryUpdateRequest;
use Modules\CmsErp\Transformers\Country\CountryResource;

class CountryController extends Controller
{
    use ApiResponseTrait;

    protected $CountryRepository;

    public function __construct(CountryRepositoryInterface $CountryRepository)
    {
        $this->CountryRepository = $CountryRepository;
    }

    public function index()
    {
        $data = $this->CountryRepository->all();
        return $this->successResponse(CountryResource::collection($data), 'Country list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->CountryRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Country not found', 404);
        }
        return $this->successResponse(new CountryResource($data), 'Country retrieved successfully');
    }

    public function store(CountryStoreRequest $request)
    {
        $data = $this->CountryRepository->create($request->validated());
        return $this->successResponse(new CountryResource($data), 'Country created successfully', 201);
    }

    public function update(CountryUpdateRequest $request, $id)
    {
        $data = $this->CountryRepository->update($id, $request->validated());
        return $this->successResponse(new CountryResource($data), 'Country updated successfully');
    }

    public function destroy($id)
    {
        $this->CountryRepository->delete($id);
        return $this->successResponse(null, 'Country deleted successfully');
    }
}
