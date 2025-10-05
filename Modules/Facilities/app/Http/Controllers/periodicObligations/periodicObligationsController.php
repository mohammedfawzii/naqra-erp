<?php

namespace Modules\Facilities\Http\Controllers\periodicObligations;

use Modules\Facilities\Repositories\periodicObligations\periodicObligationsRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;

use Modules\Facilities\Http\Requests\periodicObligations\periodicObligationsStoreRequest;
use Modules\Facilities\Http\Requests\periodicObligations\periodicObligationsUpdateRequest;
use Modules\Facilities\Transformers\periodicObligations\periodicObligationsResource;

class periodicObligationsController extends Controller
{
    use ApiResponseTrait;

    protected $periodicObligationsRepository;

    public function __construct(periodicObligationsRepositoryInterface $periodicObligationsRepository)
    {
        $this->periodicObligationsRepository = $periodicObligationsRepository;
    }

    public function index()
    {
        $data = $this->periodicObligationsRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'periodicobligations', periodicObligationsResource::class),
                    'periodicObligations list retrieved successfully'
                );
        
        }

    public function show($id)
    {
        $data = $this->periodicObligationsRepository->find($id);
        if (!$data) {
            return $this->errorResponse('periodicObligations not found', 404);
        }
        return $this->successResponse(new periodicObligationsResource($data), 'periodicObligations retrieved successfully');
    }

    public function store(periodicObligationsStoreRequest $request)
    {
        $data = $this->periodicObligationsRepository->create($request->validated());
        return $this->successResponse(new periodicObligationsResource($data), 'periodicObligations created successfully', 201);
    }

    public function update(periodicObligationsUpdateRequest $request, $id)
    {
        $data = $this->periodicObligationsRepository->update($id, $request->validated());
        return $this->successResponse(new periodicObligationsResource($data), 'periodicObligations updated successfully');
    }

    public function destroy($id)
    {
        $this->periodicObligationsRepository->delete($id);
        return $this->successResponse(null, 'periodicObligations deleted successfully');
    }
}
