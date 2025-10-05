<?php

namespace Modules\Payroll\Http\Controllers\EndofServiceCalculations;

use Modules\Payroll\Repositories\EndofServiceCalculations\EndofServiceCalculationsRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

use Modules\Payroll\Http\Requests\EndofServiceCalculations\EndofServiceCalculationsStoreRequest;
use Modules\Payroll\Http\Requests\EndofServiceCalculations\EndofServiceCalculationsUpdateRequest;
use Modules\Payroll\Transformers\EndofServiceCalculations\EndofServiceCalculationsResource;

class EndofServiceCalculationsController extends Controller
{
    use ApiResponseTrait;

    protected $EndofServiceCalculationsRepository;

    public function __construct(EndofServiceCalculationsRepositoryInterface $EndofServiceCalculationsRepository)
    {
        $this->EndofServiceCalculationsRepository = $EndofServiceCalculationsRepository;
    }

    public function index()
    {
        $data = $this->EndofServiceCalculationsRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'endofservicecalculations', EndofServiceCalculationsResource::class),
                    'EndofServiceCalculations list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->EndofServiceCalculationsRepository->find($id);
        if (!$data) {
            return $this->errorResponse('EndofServiceCalculations not found', 404);
        }
        return $this->successResponse(new EndofServiceCalculationsResource($data), 'EndofServiceCalculations retrieved successfully');
    }

    public function store(EndofServiceCalculationsStoreRequest $request)
    {
        $data = $this->EndofServiceCalculationsRepository->create($request->validated());
        return $this->successResponse(new EndofServiceCalculationsResource($data), 'EndofServiceCalculations created successfully', 201);
    }

    public function update(EndofServiceCalculationsUpdateRequest $request, $id)
    {
        $data = $this->EndofServiceCalculationsRepository->update($id, $request->validated());
        return $this->successResponse(new EndofServiceCalculationsResource($data), 'EndofServiceCalculations updated successfully');
    }

    public function destroy($id)
    {
        $this->EndofServiceCalculationsRepository->delete($id);
        return $this->successResponse(null, 'EndofServiceCalculations deleted successfully');
    }
}
