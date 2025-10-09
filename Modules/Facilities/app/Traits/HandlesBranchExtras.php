<?php

namespace Modules\Facilities\Traits;

use App\Services\AttachmentService\AttachmentService;
use Modules\Employee\Services\EmployeeCompletionService;
use Illuminate\Http\Request;

trait HandlesBranchExtras
{
    protected function handleFilesAndCompletion(
        array $validated,
        Request $request,
        $branch,
        string $pageName,
        AttachmentService $attachmentService,
        EmployeeCompletionService $completionService
    ): void {
        $files = $validated['files'] ?? null;
        unset($validated['files']);

        if ($files) {
            $attachmentService->uploadFiles($files, $branch, 'facilities');
        }

        $completionService->syncCompletion($validated, $request, $pageName);
    }
}
