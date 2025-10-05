<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RequestGenerator
{
    public static function make(string $module, string $model)
    {
        $table = Str::snake(Str::pluralStudly($model));

        $baseFolder  = module_path($module, "app/Http/Requests");
        $modelFolder = $baseFolder . "/{$model}";

        if (!File::isDirectory($baseFolder)) {
            File::makeDirectory($baseFolder, 0755, true);
        }

        if (!File::isDirectory($modelFolder)) {
            File::makeDirectory($modelFolder, 0755, true);
        }

        $storeRequestPath  = "{$modelFolder}/{$model}StoreRequest.php";
        $updateRequestPath = "{$modelFolder}/{$model}UpdateRequest.php";

        if (!Schema::hasTable($table)) {
            return "Table '{$table}' does not exist in database!";
        }

        $columns = Schema::getColumnListing($table);

        $generateRules = function ($isUpdate = false) use ($columns, $table, $model) {
            $rules = [];
            $routeParam = Str::camel($model); // ex: Nationality => nationality

             $skipColumns = ['employee_id', 'attendance_attachments_id','recruitment_attachments_id','employeeinfo_id'];

            foreach ($columns as $column) {
                if (in_array($column, ['id', 'created_at', 'updated_at', 'deleted_at','recruitment_attachments_id'])) continue;
                if (in_array($column, $skipColumns)) continue;

                $columnInfo = DB::selectOne("
                    SELECT COLUMN_TYPE, IS_NULLABLE
                    FROM INFORMATION_SCHEMA.COLUMNS
                    WHERE TABLE_NAME = ? AND COLUMN_NAME = ?
                      AND TABLE_SCHEMA = DATABASE()
                ", [$table, $column]);

                $type = $columnInfo->COLUMN_TYPE;
                $isNullable = $columnInfo->IS_NULLABLE === 'YES';

                switch (true) {
                    case preg_match('/^varchar\((\d+)\)$/i', $type, $matches):
                        $rule = "string|max:{$matches[1]}";
                        break;

                    case preg_match('/^enum\((.+)\)$/i', $type, $matches):
                        $values = array_map(
                            fn($v) => trim($v, " '\""),
                            explode(',', $matches[1])
                        );
                        $rule = 'in:' . implode(',', $values);
                        break;

                    case $type === 'text':
                        $rule = 'string';
                        break;

                    case in_array($type, ['int', 'integer', 'bigint']):
                        $rule = 'integer';
                        break;

                    case in_array($type, ['boolean', 'tinyint', 'tinyint(1)']):
                        $rule = 'boolean';
                        break;

                    case in_array($type, ['date', 'datetime', 'timestamp']):
                        $rule = 'date';
                        break;

                    case $type === 'json':
                        $rule = 'array';
                        break;

                    case preg_match('/^decimal\((\d+),(\d+)\)$/i', $type, $matches):
                        $rule = 'numeric';
                        break;

                    case in_array($type, ['float', 'double']):
                        $rule = 'numeric';
                        break;

                    default:
                        $rule = '';
                }

                 if (Str::endsWith($column, '_id')) {
                    $relatedTable = Str::snake(Str::plural(Str::replaceLast('_id', '', $column)));
                    if (Schema::hasTable($relatedTable)) {
                        $rule .= ($rule ? '|' : '') . "exists:{$relatedTable},id";
                    }
                }

                 if (in_array($column, ['img', 'image', 'images', 'file'])) {
                    $rule .= ($rule ? '|' : '') . 'max:255|file';
                }

                // unique
                $indexes = DB::select("SHOW INDEX FROM {$table} WHERE Column_name='{$column}' AND Non_unique=0");
                if (!empty($indexes) && !Str::endsWith($column, '_id')) {
                    if ($isUpdate) {
                        $rule .= ($rule ? '|' : '') . "unique:{$table},{$column},'.\$this->route('{$routeParam}').',id";
                    } else {
                        $rule .= ($rule ? '|' : '') . "unique:{$table},{$column}";
                    }
                }

                // nullable vs required
                if ($isUpdate) {
                    $rule = $isNullable
                        ? 'nullable|sometimes' . ($rule ? '|' . $rule : '')
                        : ($rule ? 'sometimes|required|' . $rule : 'sometimes|required');
                } else {
                    $rule = $isNullable
                        ? 'nullable' . ($rule ? '|' . $rule : '')
                        : ($rule ? 'required|' . $rule : 'required');
                }

                $rules[$column] = $rule;
            }

            return $rules;
        };

        File::put(
            $storeRequestPath,
            self::generateStub($module, $model . 'StoreRequest', $generateRules(false), $model, false)
        );

        File::put(
            $updateRequestPath,
            self::generateStub($module, $model . 'UpdateRequest', $generateRules(true), $model, true)
        );

        return "Requests for {$model} created successfully inside Module {$module}.";
    }

    private static function generateStub($module, $className, $rules, $modelName, $isUpdate = false)
    {
        $rulesString = "";
        foreach ($rules as $col => $r) {
            $rulesString .= "            '{$col}' => '{$r}',\n";
        }

        $baseClass = $isUpdate ? 'BaseUpdateRequest' : 'BaseStoreRequest';

        return "<?php

namespace Modules\\{$module}\\Http\\Requests\\{$modelName};

use App\Http\Requests\BaseRequest\\{$baseClass};

class {$className} extends {$baseClass}
{
    public function rules(): array
    {
        return array_merge(\$this->baseRules(), [
{$rulesString}        ]);
    }
}
";
    }
}
