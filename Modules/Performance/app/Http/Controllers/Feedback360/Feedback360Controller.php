<?php

namespace Modules\Performance\Http\Controllers\Feedback360;

use Modules\Performance\Repositories\Feedback360\Feedback360RepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Performance\Transformers\BaseCollection\BaseCollection;
use Modules\Performance\Http\Requests\Feedback360\Feedback360StoreRequest;
use Modules\Performance\Http\Requests\Feedback360\Feedback360UpdateRequest;
use Modules\Performance\Transformers\Feedback360\Feedback360Resource;
use Modules\Performance\Transformers\Feedback360\Feedback360ResourceEnums;
use App\Services\AttachmentService\AttachmentService;

class Feedback360Controller extends Controller
{
    use ApiResponseTrait;

    protected $Feedback360Repository;

    public function __construct(Feedback360RepositoryInterface $Feedback360Repository)
    {
        $this->Feedback360Repository = $Feedback360Repository;
    }

    public function index(Request $request)
    {
     return $request->boolean('list')
      ? $this->successResponse(new Feedback360ResourceEnums([]),'Feedback360 enums retrieved successfully')
      : $this->successResponse(
         new BaseCollection($this->Feedback360Repository->all(), 'feedback360', Feedback360Resource::class),
         'Feedback360 list retrieved successfully'
            );
    }

    public function show($id)
    {
        $data = $this->Feedback360Repository->find($id);
        if (!$data) {
            return $this->errorResponse('Feedback360 not found', 404);
        }
        return $this->successResponse(new Feedback360Resource($data), 'Feedback360 retrieved successfully');
    }

    public function store(Feedback360StoreRequest $request, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->Feedback360Repository->create($data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new Feedback360Resource($record), 'Feedback360 created successfully', 201);
    }

    public function update(Feedback360UpdateRequest $request, $id, AttachmentService $service)
    {
        $data = $request->validated();
        $files = $request->file('files') ?? [];
        unset($data['files']);

        $record = $this->Feedback360Repository->update($id, $data);

        if (!empty($files)) {
            $service->uploadFiles($files, $record, strtolower('Performance'));
        }

        return $this->successResponse(new Feedback360Resource($record), 'Feedback360 updated successfully');
    }

    public function destroy($id, Request $request)
    {
        $ids = $request->input('ids', []);

        if (is_string($ids)) {
            $ids = json_decode($ids, true);
        }

        if (!is_array($ids)) {
            return $this->errorResponse('IDs must be an array', 400);
        }

        $deletedCount = $this->Feedback360Repository->deleteWithAttachments($ids);

        return $this->successResponse(null, "{$deletedCount} Feedback360 deleted successfully");
    }
}
