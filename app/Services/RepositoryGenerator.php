<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class RepositoryGenerator
{
   public static function generate(string $module, string $model)
{
    $repositoryDir = module_path($module, "app/Repositories/{$model}");
    $repositoryPath = $repositoryDir . "/{$model}Repository.php";
    $interfacePath  = $repositoryDir . "/{$model}RepositoryInterface.php";

    if (!File::isDirectory($repositoryDir)) {
        File::makeDirectory($repositoryDir, 0755, true);
    }

     if (!File::exists($repositoryPath)) {
        $repositoryStub = "<?php

namespace Modules\\{$module}\\Repositories\\{$model};

use Modules\\{$module}\\Repositories\\{$model}\\{$model}RepositoryInterface;
use App\Repositories\BaseRepository\BaseRepository;
use Modules\\{$module}\\Models\\{$model};

class {$model}Repository extends BaseRepository implements {$model}RepositoryInterface
{
    public function __construct({$model} \$model)
    {
        parent::__construct(\$model);
    }
}
";
        File::put($repositoryPath, $repositoryStub);
    }

    if (!File::exists($interfacePath)) {
        $interfaceStub = "<?php

namespace Modules\\{$module}\\Repositories\\{$model};

use App\Repositories\BaseRepository\BaseRepositoryInterface;

interface {$model}RepositoryInterface extends BaseRepositoryInterface
{
    //
}
";
        File::put($interfacePath, $interfaceStub);
    }

    return "{$model}Repository and Interface checked/created successfully in folder {$model}.";
}

}
