<?php

namespace Modules\Facilities\Http\Controllers\FacilityAttachments;

use Modules\Facilities\Repositories\FacilityAttachments\FacilityAttachmentsRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\UploadFileTrait;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;

use Modules\Facilities\Http\Requests\FacilityAttachments\FacilityAttachmentsStoreRequest;
use Modules\Facilities\Http\Requests\FacilityAttachments\FacilityAttachmentsUpdateRequest;
use Modules\Facilities\Transformers\FacilityAttachments\FacilityAttachmentsResource;

class FacilityAttachmentsController extends Controller
{
    use ApiResponseTrait,UploadFileTrait;

    protected $FacilityAttachmentsRepository;

    public function __construct(FacilityAttachmentsRepositoryInterface $FacilityAttachmentsRepository)
    {
        $this->FacilityAttachmentsRepository = $FacilityAttachmentsRepository;
    }

    public function index()
    {
        $data = $this->FacilityAttachmentsRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'facilityattachments', FacilityAttachmentsResource::class),
                    'FacilityAttachments list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->FacilityAttachmentsRepository->find($id);
        if (!$data) {
            return $this->errorResponse('FacilityAttachments not found', 404);
        }
        return $this->successResponse(new FacilityAttachmentsResource($data), 'FacilityAttachments retrieved successfully');
    }

    public function store(FacilityAttachmentsStoreRequest $request)
    {
         if ($request->hasFile('file')) {
            $validated['path'] = $this->uploadFile($request->file('file'),'Facilities','uploads/attachments');
         }
        $data = $this->FacilityAttachmentsRepository->create($request->validated());
        return $this->successResponse(new FacilityAttachmentsResource($data), 'FacilityAttachments created successfully', 201);
    }

    public function update(FacilityAttachmentsUpdateRequest $request, $id)
    {
        $data = $this->FacilityAttachmentsRepository->update($id, $request->validated());
        return $this->successResponse(new FacilityAttachmentsResource($data), 'FacilityAttachments updated successfully');
    }

    public function destroy($id)
    {
        $this->FacilityAttachmentsRepository->delete($id);
        return $this->successResponse(null, 'FacilityAttachments deleted successfully');
    }
}
