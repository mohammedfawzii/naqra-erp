<?php

namespace Modules\Payroll\Http\Controllers\PayrollAttachment;

use Illuminate\Http\Request;
use App\Traits\UploadFileTrait;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Transformers\PayrollAttachment\PayrollAttachmentResource;
use Modules\Payroll\Http\Requests\PayrollAttachment\PayrollAttachmentStoreRequest;
use Modules\Payroll\Http\Requests\PayrollAttachment\PayrollAttachmentUpdateRequest;
use Modules\Payroll\Repositories\PayrollAttachment\PayrollAttachmentRepositoryInterface;

class PayrollAttachmentController extends Controller
{
    use ApiResponseTrait,UploadFileTrait;

    protected $PayrollAttachmentRepository;

    public function __construct(PayrollAttachmentRepositoryInterface $PayrollAttachmentRepository)
    {
        $this->PayrollAttachmentRepository = $PayrollAttachmentRepository;
    }

    public function index()
    {
        $data = $this->PayrollAttachmentRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'payrollattachment', PayrollAttachmentResource::class),
                    'PayrollAttachment list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->PayrollAttachmentRepository->find($id);
        if (!$data) {
            return $this->errorResponse('PayrollAttachment not found', 404);
        }
        return $this->successResponse(new PayrollAttachmentResource($data), 'PayrollAttachment retrieved successfully');
    }

    public function store(PayrollAttachmentStoreRequest $request)
    {
          if ($request->hasFile('file')) {
            $validated['path'] = $this->uploadFile($request->file('file'),'Payroll','uploads/attachments');
         }
        $data = $this->PayrollAttachmentRepository->create($request->validated());
        return $this->successResponse(new PayrollAttachmentResource($data), 'PayrollAttachment created successfully', 201);
    }

    public function update(PayrollAttachmentUpdateRequest $request, $id)
    {
        $data = $this->PayrollAttachmentRepository->update($id, $request->validated());
        return $this->successResponse(new PayrollAttachmentResource($data), 'PayrollAttachment updated successfully');
    }

    public function destroy($id)
    {
        $this->PayrollAttachmentRepository->delete($id);
        return $this->successResponse(null, 'PayrollAttachment deleted successfully');
    }
}
