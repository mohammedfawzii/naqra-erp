<?php

namespace Modules\Employee\Http\Controllers\BaseEmployeeController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Modules\Employee\Services\EmployeeDataService;
use Modules\Employee\Transformers\BaseCollection\BaseCollection;
use App\Services\AttachmentService\AttachmentService;
use Illuminate\Support\Facades\Log;
use Modules\Facilities\Services\CompleteFacilityService;

/**
 * Class BaseEmployeeController
 *
 * A unified base controller for all Employee-related controllers.
 * Contains common CRUD logic, while child controllers only need to initialize the repository and resources.
 */
abstract class BaseEmployeeController extends Controller
{
    use ApiResponseTrait;

    /** @var EmployeeDataService */
    protected EmployeeDataService $service;

    /** @var string */
    protected string $storeRequestClass;

    /** @var string */
    protected string $updateRequestClass;

    /** @var string */
    protected string $resourceClass;

    /** @var string|null */
    protected ?string $enumResourceClass = null;

    /** @var string|null */
    protected ?string $collectionName = null;

    /** @var AttachmentService */
    protected AttachmentService $attachmentService;

    /** @var CompleteFacilityService */
    protected CompleteFacilityService $completionService;

    /**
     * BaseEmployeeController constructor.
     * Injects common services shared across all Employee controllers.
     */
    public function __construct()
    {
        $this->attachmentService = app(AttachmentService::class);
        $this->completionService = app(CompleteFacilityService::class);
    }

    /**
     * Initialize the service for the current controller.
     */
    protected function initService($repository, string $pageName): void
    {
        $this->service = new EmployeeDataService(
            $repository,
            $this->attachmentService,
            $this->completionService,
            $pageName
        );
    }

    /**
     * Display all records or Enum lists if requested.
     */
    public function index(Request $request)
    {
        if ($request->boolean('list')) {
            $resource = $this->enumResourceClass ?? $this->resourceClass;
            return $this->successResponse(new $resource([]), 'Enums retrieved successfully');
        }

        return $this->successResponse(
            new BaseCollection($this->service->all(), $this->collectionName, $this->resourceClass),
            'List retrieved successfully'
        );
    }

    /**
     * Display a specific record.
     */
    public function show(int $id)
    {
        $data = $this->service->find($id);
        if (!$data) {
            return $this->errorResponse('Not found', 404);
        }

        return $this->successResponse(new $this->resourceClass($data), 'Retrieved successfully');
    }

    /**
     * Create a new record.
     */
    public function store(Request $request)
    {
        $validated = app($this->storeRequestClass)->validated();
        $record = $this->service->save($validated);
 
        return $this->successResponse(
            new $this->resourceClass($record),
            'Created successfully',
            201
        );
    }

    /**
     * Update an existing record.
     */
    public function update(Request $request, int $id)
    {
        $validated = app($this->updateRequestClass)->validated();
        $record = $this->service->save($validated, $id);

        return $this->successResponse(
            new $this->resourceClass($record),
            'Updated successfully'
        );
    }

    /**
     * Delete multiple records.
     */
    public function destroy(Request $request)
    {
        $ids = $request->input('ids', []);
        if (is_string($ids)) {
            $ids = json_decode($ids, true);
        }

        if (!is_array($ids)) {
            return $this->errorResponse('IDs must be an array', 400);
        }

        $deletedCount = $this->service->delete($ids);

        return $this->successResponse(
            null,
            "$deletedCount records deleted successfully"
        );
    }
}
