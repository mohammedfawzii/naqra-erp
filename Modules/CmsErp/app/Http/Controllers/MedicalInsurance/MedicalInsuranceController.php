<?php

namespace Modules\CmsErp\Http\Controllers\MedicalInsurance;

use Modules\CmsErp\Repositories\MedicalInsurance\MedicalInsuranceRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\MedicalInsurance\MedicalInsuranceStoreRequest;
use Modules\CmsErp\Http\Requests\MedicalInsurance\MedicalInsuranceUpdateRequest;
use Modules\CmsErp\Transformers\MedicalInsurance\MedicalInsuranceResource;

class MedicalInsuranceController extends Controller
{
    use ApiResponseTrait;

    protected $MedicalInsuranceRepository;

    public function __construct(MedicalInsuranceRepositoryInterface $MedicalInsuranceRepository)
    {
        $this->MedicalInsuranceRepository = $MedicalInsuranceRepository;
    }

    public function index()
    {
        $data = $this->MedicalInsuranceRepository->all();
        return $this->successResponse(MedicalInsuranceResource::collection($data), 'MedicalInsurance list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->MedicalInsuranceRepository->find($id);
        if (!$data) {
            return $this->errorResponse('MedicalInsurance not found', 404);
        }
        return $this->successResponse(new MedicalInsuranceResource($data), 'MedicalInsurance retrieved successfully');
    }

    public function store(MedicalInsuranceStoreRequest $request)
    {
        $data = $this->MedicalInsuranceRepository->create($request->validated());
        return $this->successResponse(new MedicalInsuranceResource($data), 'MedicalInsurance created successfully', 201);
    }

    public function update(MedicalInsuranceUpdateRequest $request, $id)
    {
        $data = $this->MedicalInsuranceRepository->update($id, $request->validated());
        return $this->successResponse(new MedicalInsuranceResource($data), 'MedicalInsurance updated successfully');
    }

    public function destroy($id)
    {
        $this->MedicalInsuranceRepository->delete($id);
        return $this->successResponse(null, 'MedicalInsurance deleted successfully');
    }
}
