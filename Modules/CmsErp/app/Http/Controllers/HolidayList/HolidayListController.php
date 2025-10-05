<?php

namespace Modules\CmsErp\Http\Controllers\HolidayList;

use Modules\CmsErp\Repositories\HolidayList\HolidayListRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\HolidayList\HolidayListStoreRequest;
use Modules\CmsErp\Http\Requests\HolidayList\HolidayListUpdateRequest;
use Modules\CmsErp\Transformers\HolidayList\HolidayListResource;

class HolidayListController extends Controller
{
    use ApiResponseTrait;

    protected $HolidayListRepository;

    public function __construct(HolidayListRepositoryInterface $HolidayListRepository)
    {
        $this->HolidayListRepository = $HolidayListRepository;
    }

    public function index()
    {
        $data = $this->HolidayListRepository->all();
        return $this->successResponse(HolidayListResource::collection($data), 'HolidayList list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->HolidayListRepository->find($id);
        if (!$data) {
            return $this->errorResponse('HolidayList not found', 404);
        }
        return $this->successResponse(new HolidayListResource($data), 'HolidayList retrieved successfully');
    }

    public function store(HolidayListStoreRequest $request)
    {
        $data = $this->HolidayListRepository->create($request->validated());
        return $this->successResponse(new HolidayListResource($data), 'HolidayList created successfully', 201);
    }

    public function update(HolidayListUpdateRequest $request, $id)
    {
        $data = $this->HolidayListRepository->update($id, $request->validated());
        return $this->successResponse(new HolidayListResource($data), 'HolidayList updated successfully');
    }

    public function destroy($id)
    {
        $this->HolidayListRepository->delete($id);
        return $this->successResponse(null, 'HolidayList deleted successfully');
    }
}
