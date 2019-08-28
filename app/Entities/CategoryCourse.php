<?php


namespace Mooc\Entities;


use Mooc\Scopes\CategoryCourseScope;

class CategoryCourse extends Category
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->parent_id = env('CATEGORY_COURSES');
    }

    protected static function boot()
    {
        static::addGlobalScope(new CategoryCourseScope());

        parent::boot();
    }


    public function courses()
    {
        return $this->hasMany(Course::class,'category_id');
    }
}
