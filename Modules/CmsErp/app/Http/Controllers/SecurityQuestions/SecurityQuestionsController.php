<?php

namespace Modules\CmsErp\Http\Controllers\SecurityQuestions;

use Modules\CmsErp\Repositories\SecurityQuestions\SecurityQuestionsRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\SecurityQuestions\SecurityQuestionsStoreRequest;
use Modules\CmsErp\Http\Requests\SecurityQuestions\SecurityQuestionsUpdateRequest;
use Modules\CmsErp\Transformers\SecurityQuestions\SecurityQuestionsResource;

class SecurityQuestionsController extends Controller
{
    use ApiResponseTrait;

    protected $SecurityQuestionsRepository;

    public function __construct(SecurityQuestionsRepositoryInterface $SecurityQuestionsRepository)
    {
        $this->SecurityQuestionsRepository = $SecurityQuestionsRepository;
    }

    public function index()
    {
        $data = $this->SecurityQuestionsRepository->all();
        return $this->successResponse(SecurityQuestionsResource::collection($data), 'SecurityQuestions list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->SecurityQuestionsRepository->find($id);
        if (!$data) {
            return $this->errorResponse('SecurityQuestions not found', 404);
        }
        return $this->successResponse(new SecurityQuestionsResource($data), 'SecurityQuestions retrieved successfully');
    }

    public function store(SecurityQuestionsStoreRequest $request)
    {
        $data = $this->SecurityQuestionsRepository->create($request->validated());
        return $this->successResponse(new SecurityQuestionsResource($data), 'SecurityQuestions created successfully', 201);
    }

    public function update(SecurityQuestionsUpdateRequest $request, $id)
    {
        $data = $this->SecurityQuestionsRepository->update($id, $request->validated());
        return $this->successResponse(new SecurityQuestionsResource($data), 'SecurityQuestions updated successfully');
    }

    public function destroy($id)
    {
        $this->SecurityQuestionsRepository->delete($id);
        return $this->successResponse(null, 'SecurityQuestions deleted successfully');
    }
}
