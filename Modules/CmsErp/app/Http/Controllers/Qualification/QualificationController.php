<?php

namespace Modules\CmsErp\Http\Controllers\Qualification;

use Modules\CmsErp\Repositories\Qualification\QualificationRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\CmsErp\Transformers\BaseCollection\BaseCollection;

use Modules\CmsErp\Http\Requests\Qualification\QualificationStoreRequest;
use Modules\CmsErp\Http\Requests\Qualification\QualificationUpdateRequest;
use Modules\CmsErp\Transformers\Qualification\QualificationResource;

class QualificationController extends Controller
{
    use ApiResponseTrait;

    protected $QualificationRepository;

    public function __construct(QualificationRepositoryInterface $QualificationRepository)
    {
        $this->QualificationRepository = $QualificationRepository;
    }

    public function index()
    {
        $data = $this->QualificationRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'qualification', QualificationResource::class),
                    'Qualification list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->QualificationRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Qualification not found', 404);
        }
        return $this->successResponse(new QualificationResource($data), 'Qualification retrieved successfully');
    }

    public function store(QualificationStoreRequest $request)
    {
        $data = $this->QualificationRepository->create($request->validated());
        return $this->successResponse(new QualificationResource($data), 'Qualification created successfully', 201);
    }

    public function update(QualificationUpdateRequest $request, $id)
    {
        $data = $this->QualificationRepository->update($id, $request->validated());
        return $this->successResponse(new QualificationResource($data), 'Qualification updated successfully');
    }

    public function destroy($id)
    {
        $this->QualificationRepository->delete($id);
        return $this->successResponse(null, 'Qualification deleted successfully');
    }
}
