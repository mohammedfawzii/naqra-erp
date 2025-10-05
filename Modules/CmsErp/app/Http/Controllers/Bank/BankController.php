<?php

namespace Modules\CmsErp\Http\Controllers\Bank;

use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Modules\CmsErp\Transformers\Bank\BankResource;
use Modules\CmsErp\Http\Requests\Bank\BankStoreRequest;

use Modules\CmsErp\Http\Requests\Bank\BankUpdateRequest;
use Modules\CmsErp\Repositories\Bank\BankRepositoryInterface;
use Modules\Payroll\Transformers\BaseCollection\BaseCollection;

class BankController extends Controller
{
    use ApiResponseTrait;

    protected $BankRepository;

    public function __construct(BankRepositoryInterface $BankRepository)
    {
        $this->BankRepository = $BankRepository;
    }

    public function index()
    {
        $data = $this->BankRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'bank', BankResource::class),
                    'Bank list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->BankRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Bank not found', 404);
        }
        return $this->successResponse(new BankResource($data), 'Bank retrieved successfully');
    }

    public function store(BankStoreRequest $request)
    {
        $data = $this->BankRepository->create($request->validated());
        return $this->successResponse(new BankResource($data), 'Bank created successfully', 201);
    }

    public function update(BankUpdateRequest $request, $id)
    {
        $data = $this->BankRepository->update($id, $request->validated());
        return $this->successResponse(new BankResource($data), 'Bank updated successfully');
    }

    public function destroy($id)
    {
        $this->BankRepository->delete($id);
        return $this->successResponse(null, 'Bank deleted successfully');
    }
}
