<?php


namespace Mooc\Enums;


use Mooc\Entities\UtilityClass;
use Mooc\Scopes\SkuStatusScope;

class SkuStatus extends UtilityClass
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->parent_id = env('UTILITY_CLASSES_STATUS_SKU');
    }

    protected static function boot()
    {
        static::addGlobalScope(new SkuStatusScope());

        parent::boot();
    }
}
