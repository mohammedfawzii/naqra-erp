<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class ControllerGenerator
{
    public static function make(string $module, string $model)
    {
        $controllerDir  = module_path($module, "app/Http/Controllers/{$model}");
        $controllerPath = $controllerDir . "/{$model}Controller.php";

        $namespaceRepo     = "Modules\\{$module}\\Repositories\\{$model}\\{$model}RepositoryInterface";
        $namespaceResource = "Modules\\{$module}\\Transformers\\{$model}\\{$model}Resource";

        if (!File::isDirectory($controllerDir)) {
            File::makeDirectory($controllerDir, 0755, true);
        }

        if (File::exists($controllerPath)) {
            return "{$model}Controller already exists!";
        }

        $storeRequestClass = "Modules\\{$module}\\Http\\Requests\\{$model}\\{$model}StoreRequest";
        $updateRequestClass = "Modules\\{$module}\\Http\\Requests\\{$model}\\{$model}UpdateRequest";
        $namespaceBaseCol   = "Modules\\{$module}\\Transformers\\BaseCollection\\BaseCollection";
        $namespaceEnums     = "Modules\\{$module}\\Transformers\\{$model}\\{$model}ResourceEnums";

        $modelKey = strtolower($model);

        $controllerStub = "<?php

namespace Modules\\{$module}\\Http\\Controllers\\{$model};

use {$namespaceRepo};
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use {$namespaceBaseCol};
use {$storeRequestClass};
use {$updateRequestClass};
use {$namespaceResource};
use {$namespaceEnums};
use App\Services\AttachmentService\AttachmentService;

class {$model}Controller extends Controller
{
    use ApiResponseTrait;

    protected \${$model}Repository;

    public function __construct({$model}RepositoryInterface \${$model}Repository)
    {
        \$this->{$model}Repository = \${$model}Repository;
    }

    public function index(Request \$request)
    {
     return \$request->boolean('list')
      ? \$this->successResponse(new {$model}ResourceEnums([]),'{$model} enums retrieved successfully')
      : \$this->successResponse(
         new BaseCollection(\$this->{$model}Repository->all(), '{$modelKey}', {$model}Resource::class),
         '{$model} list retrieved successfully'
            );
    }

    public function show(\$id)
    {
        \$data = \$this->{$model}Repository->find(\$id);
        if (!\$data) {
            return \$this->errorResponse('{$model} not found', 404);
        }
        return \$this->successResponse(new {$model}Resource(\$data), '{$model} retrieved successfully');
    }

    public function store({$model}StoreRequest \$request, AttachmentService \$service)
    {
        \$data = \$request->validated();
        \$files = \$request->file('files') ?? [];
        unset(\$data['files']);

        \$record = \$this->{$model}Repository->create(\$data);

        if (!empty(\$files)) {
            \$service->uploadFiles(\$files, \$record, strtolower('{$module}'));
        }

        return \$this->successResponse(new {$model}Resource(\$record), '{$model} created successfully', 201);
    }

    public function update({$model}UpdateRequest \$request, \$id, AttachmentService \$service)
    {
        \$data = \$request->validated();
        \$files = \$request->file('files') ?? [];
        unset(\$data['files']);

        \$record = \$this->{$model}Repository->update(\$id, \$data);

        if (!empty(\$files)) {
            \$service->uploadFiles(\$files, \$record, strtolower('{$module}'));
        }

        return \$this->successResponse(new {$model}Resource(\$record), '{$model} updated successfully');
    }

    public function destroy(\$id, Request \$request)
    {
        \$ids = \$request->input('ids', []);

        if (is_string(\$ids)) {
            \$ids = json_decode(\$ids, true);
        }

        if (!is_array(\$ids)) {
            return \$this->errorResponse('IDs must be an array', 400);
        }

        \$deletedCount = \$this->{$model}Repository->deleteWithAttachments(\$ids);

        return \$this->successResponse(null, \"{\$deletedCount} {$model} deleted successfully\");
    }
}
";

        File::put($controllerPath, $controllerStub);

        return "{$model}Controller created successfully in folder {$model}.";
    }
}
