<?php

namespace Modules\Facilities\Http\Controllers\License;

use Modules\Facilities\Repositories\License\LicenseRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;

use Modules\Facilities\Http\Requests\License\LicenseStoreRequest;
use Modules\Facilities\Http\Requests\License\LicenseUpdateRequest;
use Modules\Facilities\Transformers\License\LicenseResource;

class LicenseController extends Controller
{
    use ApiResponseTrait;

    protected $LicenseRepository;

    public function __construct(LicenseRepositoryInterface $LicenseRepository)
    {
        $this->LicenseRepository = $LicenseRepository;
    }

    public function index()
    {
        $data = $this->LicenseRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'license', LicenseResource::class),
                    'License list retrieved successfully'
                );
        
        }

    public function show($id)
    {
        $data = $this->LicenseRepository->find($id);
        if (!$data) {
            return $this->errorResponse('License not found', 404);
        }
        return $this->successResponse(new LicenseResource($data), 'License retrieved successfully');
    }

    public function store(LicenseStoreRequest $request)
    {
        $data = $this->LicenseRepository->create($request->validated());
        return $this->successResponse(new LicenseResource($data), 'License created successfully', 201);
    }

    public function update(LicenseUpdateRequest $request, $id)
    {
        $data = $this->LicenseRepository->update($id, $request->validated());
        return $this->successResponse(new LicenseResource($data), 'License updated successfully');
    }

    public function destroy($id)
    {
        $this->LicenseRepository->delete($id);
        return $this->successResponse(null, 'License deleted successfully');
    }
}
