<?php

namespace Mooc\Entities;

use Illuminate\Database\Eloquent\Model;
use Mooc\Scopes\PayScope;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Pay.
 *
 * @package namespace Mooc\Entities;
 */
class Pay extends UtilityClass
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    protected static function boot()
    {
        static::addGlobalScope(new PayScope());

        parent::boot();
    }
}
