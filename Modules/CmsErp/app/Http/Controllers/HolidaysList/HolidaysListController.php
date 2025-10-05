<?php

namespace Modules\CmsErp\Http\Controllers\HolidaysList;

use Modules\CmsErp\Repositories\HolidaysList\HolidaysListRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\HolidaysList\HolidaysListStoreRequest;
use Modules\CmsErp\Http\Requests\HolidaysList\HolidaysListUpdateRequest;
use Modules\CmsErp\Transformers\HolidaysList\HolidaysListResource;

class HolidaysListController extends Controller
{
    use ApiResponseTrait;

    protected $HolidaysListRepository;

    public function __construct(HolidaysListRepositoryInterface $HolidaysListRepository)
    {
        $this->HolidaysListRepository = $HolidaysListRepository;
    }

    public function index()
    {
        $data = $this->HolidaysListRepository->all();
        return $this->successResponse(HolidaysListResource::collection($data), 'HolidaysList list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->HolidaysListRepository->find($id);
        if (!$data) {
            return $this->errorResponse('HolidaysList not found', 404);
        }
        return $this->successResponse(new HolidaysListResource($data), 'HolidaysList retrieved successfully');
    }

    public function store(HolidaysListStoreRequest $request)
    {
        $data = $this->HolidaysListRepository->create($request->validated());
        return $this->successResponse(new HolidaysListResource($data), 'HolidaysList created successfully', 201);
    }

    public function update(HolidaysListUpdateRequest $request, $id)
    {
        $data = $this->HolidaysListRepository->update($id, $request->validated());
        return $this->successResponse(new HolidaysListResource($data), 'HolidaysList updated successfully');
    }

    public function destroy($id)
    {
        $this->HolidaysListRepository->delete($id);
        return $this->successResponse(null, 'HolidaysList deleted successfully');
    }
}
