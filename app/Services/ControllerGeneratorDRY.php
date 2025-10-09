<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class ControllerGeneratorDRY
{
    public static function make(string $module, string $model)
    {
        $controllerDir  = module_path($module, "app/Http/Controllers/{$model}");
        $controllerPath = $controllerDir . "/{$model}Controller.php";

        $repositoryInterface = "Modules\\{$module}\\Repositories\\{$model}\\{$model}RepositoryInterface";
        $baseController       = "Modules\\{$module}\\Http\\Controllers\\BaseEmployeeController\\BaseEmployeeController";
        $storeRequestClass    = "Modules\\{$module}\\Http\\Requests\\{$model}\\{$model}StoreRequest";
        $updateRequestClass   = "Modules\\{$module}\\Http\\Requests\\{$model}\\{$model}UpdateRequest";
        $resourceClass        = "Modules\\{$module}\\Transformers\\{$model}\\{$model}Resource";
        $enumResourceClass    = "Modules\\{$module}\\Transformers\\{$model}\\{$model}ResourceEnums";

        if (!File::isDirectory($controllerDir)) {
            File::makeDirectory($controllerDir, 0755, true);
        }

        if (File::exists($controllerPath)) {
            return "{$model}Controller already exists!";
        }

        $controllerStub = "<?php

namespace Modules\\{$module}\\Http\\Controllers\\{$model};

use {$repositoryInterface};
use {$baseController};
use {$storeRequestClass};
use {$updateRequestClass};
use {$resourceClass};
use {$enumResourceClass};

class {$model}Controller extends BaseEmployeeController
{
    public function __construct({$model}RepositoryInterface \$repository)
    {
        parent::__construct();

        \$this->initService(\$repository, '" . strtolower($module) . "/" . strtolower($model) . "');
        \$this->storeRequestClass = {$model}StoreRequest::class;
        \$this->updateRequestClass = {$model}UpdateRequest::class;
        \$this->resourceClass = {$model}Resource::class;
        \$this->enumResourceClass = {$model}ResourceEnums::class;

        \$this->collectionName = '{$model}';
    }
}
";

        File::put($controllerPath, $controllerStub);

        return "{$model}Controller created successfully in folder {$model}.";
    }
}
