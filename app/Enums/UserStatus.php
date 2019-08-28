<?php


namespace Mooc\Enums;


use Mooc\Entities\UtilityClass;
use Mooc\Scopes\UserStatusScope;

class UserStatus extends UtilityClass
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->parent_id = env('UTILITY_CLASSES_STATUS_USER');
    }

    protected static function boot()
    {
        static::addGlobalScope(new UserStatusScope());

        parent::boot();
    }
}
