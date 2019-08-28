<?php


namespace Mooc\Entities;


use Mooc\Scopes\CategoryBlogScope;

class CategoryBlog extends Category
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->parent_id = env('CATEGORY_BLOG');
    }

    protected static function boot()
    {
        static::addGlobalScope(new CategoryBlogScope());

        parent::boot();
    }
}
