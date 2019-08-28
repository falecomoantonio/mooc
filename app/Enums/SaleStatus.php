<?php


namespace Mooc\Enums;


use Mooc\Entities\UtilityClass;
use Mooc\Scopes\SaleStatusScope;
use Mooc\Scopes\SkuStatusScope;

class SaleStatus extends UtilityClass
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->parent_id = env('UTILITY_CLASSES_STATUS_SALES');
    }

    protected static function boot()
    {
        static::addGlobalScope(new SaleStatusScope());

        parent::boot();
    }
}
