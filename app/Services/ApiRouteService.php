<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ApiRouteService
{
    public static function make(string $module, string $model, string $prefix = null)
    {
        $apiFile = module_path($module, "Routes/api.php");

        if (!File::exists($apiFile)) {
            $content = "<?php\n\nuse Illuminate\Support\Facades\Route;\n\n";
            File::put($apiFile, $content);
        }

        $content = File::get($apiFile);

        // Plural & name
        $plural = Str::plural(Str::snake($model)); // ex: Language -> languages
        $name   = Str::snake($model);              // ex: Language -> language

        // Controller namespace with folder
        $controllerNamespace = "Modules\\{$module}\\Http\\Controllers\\{$model}\\{$model}Controller";
        $controllerUse = "use {$controllerNamespace};";

        // Add use statement if not exists
        if (!str_contains($content, $controllerUse)) {
            $content = preg_replace(
                '/(use Illuminate\\\\Support\\\\Facades\\\\Route;)/',
                "$1\n{$controllerUse}",
                $content,
                1
            );
        }

        // Route line
        $routeLine = "Route::apiResource('{$plural}', {$model}Controller::class)->names('{$name}');";

        // Set default prefix if not provided
        $prefixPath = $prefix ? "v1/{$prefix}" : "v1";

        // Add route inside prefix group if it exists, otherwise just append
        $groupPattern = "/Route::prefix\('{$prefixPath}'\)->group\(function\s*\(\)\s*\{([\s\S]*?)\}\);/";

        if (preg_match($groupPattern, $content, $matches)) {
            if (!str_contains($matches[1], $routeLine)) {
                // Insert before closing brace of the group
                $newGroup = str_replace(
                    "});",
                    "    {$routeLine}\n});",
                    $matches[0]
                );
                $content = str_replace($matches[0], $newGroup, $content);
            }
        } else {
            // Just append at the end of the file
            $content .= "\nRoute::prefix('{$prefixPath}')->group(function () {\n";
            $content .= "    {$routeLine}\n";
            $content .= "});\n";
        }

        File::put($apiFile, $content);

        return "Route for {$model} added successfully in {$module}/Routes/api.php";
    }
}
