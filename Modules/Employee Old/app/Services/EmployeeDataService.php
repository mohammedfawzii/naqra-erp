<?php

namespace Modules\Employee\Services;

use App\Services\AttachmentService\AttachmentService;
use Modules\Facilities\Services\CompleteFacilityService;

class EmployeeDataService
{
    protected $repository;
    protected AttachmentService $attachmentService;
    protected CompleteFacilityService $completionService;
    protected string $pageName;


    public function __construct($repository, AttachmentService $attachmentService, CompleteFacilityService $completionService, string $pageName)
    {
        $this->repository = $repository;
        $this->attachmentService = $attachmentService;
        $this->completionService = $completionService;
        $this->pageName = $pageName;
    }

    public function all()
    {
        return $this->repository->all();
    }
    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function save(array $data, ?int $id = null)
    {
        $files = $data['files'] ?? null;
        unset($data['files']);

        $record = $id
            ? $this->repository->update($id, $data)
            : $this->repository->create($data);

        $this->attachmentService->uploadFiles($files, $record, 'employee');
        $this->completionService->syncCompletion($data, request(), $this->pageName);

        return $record;
    }

    
    public function delete(array $ids): int
    {
        return $this->repository->deleteWithAttachments($ids);
    }
}
