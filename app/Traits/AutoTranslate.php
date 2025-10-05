<?php
namespace App\Traits;

trait AutoTranslate
{
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (method_exists($this, 'isTranslatableAttribute') && $this->isTranslatableAttribute($key)) {
            return $this->getTranslation($key, app()->getLocale());
        }

        return $value;
    }
}
