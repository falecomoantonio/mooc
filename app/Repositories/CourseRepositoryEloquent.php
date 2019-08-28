<?php

namespace Mooc\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Mooc\Repositories\CourseRepository;
use Mooc\Entities\Course;
use Mooc\Validators\CourseValidator;

/**
 * Class CourseRepositoryEloquent.
 *
 * @package namespace Mooc\Repositories;
 */
class CourseRepositoryEloquent extends BaseRepository implements CourseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Course::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CourseValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
