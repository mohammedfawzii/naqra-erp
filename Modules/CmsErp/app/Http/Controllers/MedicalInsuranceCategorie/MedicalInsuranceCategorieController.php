<?php

namespace Modules\CmsErp\Http\Controllers\MedicalInsuranceCategorie;

use Modules\CmsErp\Repositories\MedicalInsuranceCategorie\MedicalInsuranceCategorieRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\MedicalInsuranceCategorie\MedicalInsuranceCategorieStoreRequest;
use Modules\CmsErp\Http\Requests\MedicalInsuranceCategorie\MedicalInsuranceCategorieUpdateRequest;
use Modules\CmsErp\Transformers\MedicalInsuranceCategorie\MedicalInsuranceCategorieResource;

class MedicalInsuranceCategorieController extends Controller
{
    use ApiResponseTrait;

    protected $MedicalInsuranceCategorieRepository;

    public function __construct(MedicalInsuranceCategorieRepositoryInterface $MedicalInsuranceCategorieRepository)
    {
        $this->MedicalInsuranceCategorieRepository = $MedicalInsuranceCategorieRepository;
    }

    public function index()
    {
        $data = $this->MedicalInsuranceCategorieRepository->all();
        return $this->successResponse(MedicalInsuranceCategorieResource::collection($data), 'MedicalInsuranceCategorie list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->MedicalInsuranceCategorieRepository->find($id);
        if (!$data) {
            return $this->errorResponse('MedicalInsuranceCategorie not found', 404);
        }
        return $this->successResponse(new MedicalInsuranceCategorieResource($data), 'MedicalInsuranceCategorie retrieved successfully');
    }

    public function store(MedicalInsuranceCategorieStoreRequest $request)
    {
        $data = $this->MedicalInsuranceCategorieRepository->create($request->validated());
        return $this->successResponse(new MedicalInsuranceCategorieResource($data), 'MedicalInsuranceCategorie created successfully', 201);
    }

    public function update(MedicalInsuranceCategorieUpdateRequest $request, $id)
    {
        $data = $this->MedicalInsuranceCategorieRepository->update($id, $request->validated());
        return $this->successResponse(new MedicalInsuranceCategorieResource($data), 'MedicalInsuranceCategorie updated successfully');
    }

    public function destroy($id)
    {
        $this->MedicalInsuranceCategorieRepository->delete($id);
        return $this->successResponse(null, 'MedicalInsuranceCategorie deleted successfully');
    }
}
