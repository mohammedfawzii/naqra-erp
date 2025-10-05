<?php

namespace Modules\Facilities\Http\Controllers\Owner;

use Modules\Facilities\Repositories\Owner\OwnerRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;

use Modules\Facilities\Http\Requests\Owner\OwnerStoreRequest;
use Modules\Facilities\Http\Requests\Owner\OwnerUpdateRequest;
use Modules\Facilities\Transformers\Owner\OwnerResource;

class OwnerController extends Controller
{
    use ApiResponseTrait;

    protected $OwnerRepository;

    public function __construct(OwnerRepositoryInterface $OwnerRepository)
    {
        $this->OwnerRepository = $OwnerRepository;
    }

    public function index()
    {
        $data = $this->OwnerRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'owner', OwnerResource::class),
                    'Owner list retrieved successfully'
                );
        
        }

    public function show($id)
    {
        $data = $this->OwnerRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Owner not found', 404);
        }
        return $this->successResponse(new OwnerResource($data), 'Owner retrieved successfully');
    }

    public function store(OwnerStoreRequest $request)
    {
        $data = $this->OwnerRepository->create($request->validated());
        return $this->successResponse(new OwnerResource($data), 'Owner created successfully', 201);
    }

    public function update(OwnerUpdateRequest $request, $id)
    {
        $data = $this->OwnerRepository->update($id, $request->validated());
        return $this->successResponse(new OwnerResource($data), 'Owner updated successfully');
    }

    public function destroy($id)
    {
        $this->OwnerRepository->delete($id);
        return $this->successResponse(null, 'Owner deleted successfully');
    }
}
