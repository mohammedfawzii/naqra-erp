<?php

namespace Modules\Facilities\Http\Controllers\Facilities;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Modules\Facilities\Repositories\Facilities\FacilitiesRepositoryInterface;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;
use Modules\Facilities\Transformers\Facilities\FacilitiesResource;
use Modules\Facilities\Transformers\Facilities\FacilitiesResourceEnums;
use Modules\Facilities\Http\Requests\Facilities\FacilitiesStoreRequest;
use Modules\Facilities\Http\Requests\Facilities\FacilitiesUpdateRequest;

class FacilitiesController extends Controller
{
    use ApiResponseTrait;

    protected FacilitiesRepositoryInterface $facilitiesRepository;

    public function __construct(FacilitiesRepositoryInterface $facilitiesRepository)
    {
        $this->facilitiesRepository = $facilitiesRepository;
    }

    public function index(Request $request)
    {
        if ($request->boolean('list')) {
            return $this->successResponse(
                new FacilitiesResourceEnums([]),
                'Facilities enums retrieved successfully'
            );
        }

        $facilities = $this->facilitiesRepository->all();

        return $this->successResponse(
            new BaseCollection($facilities, 'facilities', FacilitiesResource::class),
            'Facilities list retrieved successfully'
        );
    }

    public function show($id)
    {
        $facility = $this->facilitiesRepository->find($id);

        if (!$facility) {
            return $this->errorResponse('Facility not found', 404);
        }

        return $this->successResponse(
            new FacilitiesResource($facility),
            'Facility retrieved successfully'
        );
    }

    public function store(FacilitiesStoreRequest $request)
    {
        $record = $this->facilitiesRepository->create($request->validated());

        return $this->successResponse(
            new FacilitiesResource($record),
            'Facility created successfully',
            201
        );
    }

    public function update(FacilitiesUpdateRequest $request, $id)
    {
        $record = $this->facilitiesRepository->update($id, $request->validated());

        return $this->successResponse(
            new FacilitiesResource($record),
            'Facility updated successfully'
        );
    }

    public function destroy(Request $request, $id = null)
    {
        $ids = $request->input('ids', $id ? [$id] : []);

        if (is_string($ids)) {
            $ids = json_decode($ids, true);
        }
        if (!is_array($ids) || empty($ids)) {
            return $this->errorResponse('IDs must be an array or a valid ID must be provided', 400);
        }
        $deletedCount = $this->facilitiesRepository->deleteWithAttachments($ids);
        return $this->successResponse(
            null,
            "{$deletedCount} facilities deleted successfully"
        );
    }
}
