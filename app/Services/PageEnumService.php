<?php
namespace App\Services;

class PageEnumService
{
    public static function getEnums(string $page)
    {
        $config = config("page_enums.$page");

        if (!$config) {
            return [];
        }

        $result = [];

        foreach ($config as $key => $value) {
            if (is_array($value) && isset($value[0], $value[1])) {
                 [$modelClass, $resourceClass] = $value;
                $result[$key] = $resourceClass::collection($modelClass::all());

            } elseif (is_array($value)) {
                 $result[$key] = $value;

            } elseif (class_exists($value)) {
                 $result[$key] = $value::collection([]);
            }
        }

        return $result;
    }
}

