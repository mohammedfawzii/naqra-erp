<?php

namespace Modules\Facilities\Http\Controllers\MedicalInsurancesFacilities;

use Modules\Facilities\Repositories\MedicalInsurancesFacilities\MedicalInsurancesFacilitiesRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;

use Modules\Facilities\Http\Requests\MedicalInsurancesFacilities\MedicalInsurancesFacilitiesStoreRequest;
use Modules\Facilities\Http\Requests\MedicalInsurancesFacilities\MedicalInsurancesFacilitiesUpdateRequest;
use Modules\Facilities\Transformers\MedicalInsurancesFacilities\MedicalInsurancesFacilitiesResource;

class MedicalInsurancesFacilitiesController extends Controller
{
    use ApiResponseTrait;

    protected $MedicalInsurancesFacilitiesRepository;

    public function __construct(MedicalInsurancesFacilitiesRepositoryInterface $MedicalInsurancesFacilitiesRepository)
    {
        $this->MedicalInsurancesFacilitiesRepository = $MedicalInsurancesFacilitiesRepository;
    }

    public function index()
    {
        $data = $this->MedicalInsurancesFacilitiesRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'medicalinsurancesfacilities', MedicalInsurancesFacilitiesResource::class),
                    'MedicalInsurancesFacilities list retrieved successfully'
                );
        
        }

    public function show($id)
    {
        $data = $this->MedicalInsurancesFacilitiesRepository->find($id);
        if (!$data) {
            return $this->errorResponse('MedicalInsurancesFacilities not found', 404);
        }
        return $this->successResponse(new MedicalInsurancesFacilitiesResource($data), 'MedicalInsurancesFacilities retrieved successfully');
    }

    public function store(MedicalInsurancesFacilitiesStoreRequest $request)
    {
        $data = $this->MedicalInsurancesFacilitiesRepository->create($request->validated());
        return $this->successResponse(new MedicalInsurancesFacilitiesResource($data), 'MedicalInsurancesFacilities created successfully', 201);
    }

    public function update(MedicalInsurancesFacilitiesUpdateRequest $request, $id)
    {
        $data = $this->MedicalInsurancesFacilitiesRepository->update($id, $request->validated());
        return $this->successResponse(new MedicalInsurancesFacilitiesResource($data), 'MedicalInsurancesFacilities updated successfully');
    }

    public function destroy($id)
    {
        $this->MedicalInsurancesFacilitiesRepository->delete($id);
        return $this->successResponse(null, 'MedicalInsurancesFacilities deleted successfully');
    }
}
