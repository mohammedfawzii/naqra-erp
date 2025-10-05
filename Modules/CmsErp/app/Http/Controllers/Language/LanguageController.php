<?php

namespace Modules\CmsErp\Http\Controllers\Language;

use Modules\CmsErp\Repositories\Language\LanguageRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\CmsErp\Http\Requests\Language\LanguageStoreRequest;
use Modules\CmsErp\Http\Requests\Language\LanguageUpdateRequest;
use Modules\CmsErp\Transformers\Language\LanguageResource;

class LanguageController extends Controller
{
    use ApiResponseTrait;

    protected $LanguageRepository;

    public function __construct(LanguageRepositoryInterface $LanguageRepository)
    {
        $this->LanguageRepository = $LanguageRepository;
    }

    public function index()
    {
        $data = $this->LanguageRepository->all();
        return $this->successResponse(LanguageResource::collection($data), 'Language list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->LanguageRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Language not found', 404);
        }
        return $this->successResponse(new LanguageResource($data), 'Language retrieved successfully');
    }

    public function store(LanguageStoreRequest $request)
    {
        $data = $this->LanguageRepository->create($request->validated());
        return $this->successResponse(new LanguageResource($data), 'Language created successfully', 201);
    }

    public function update(LanguageUpdateRequest $request, $id)
    {
        $data = $this->LanguageRepository->update($id, $request->validated());
        return $this->successResponse(new LanguageResource($data), 'Language updated successfully');
    }

    public function destroy($id)
    {
        $this->LanguageRepository->delete($id);
        return $this->successResponse(null, 'Language deleted successfully');
    }
}
