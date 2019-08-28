<?php


namespace Mooc\Enums;


use Mooc\Entities\UtilityClass;
use Mooc\Scopes\CategoryBlogScope;
use Mooc\Scopes\CourseStatusScope;

class CourseStatus extends UtilityClass
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->parent_id = env('UTILITY_CLASSES_STATUS_COURSE');
    }

    protected static function boot()
    {
        static::addGlobalScope(new CourseStatusScope());

        parent::boot();
    }
}
