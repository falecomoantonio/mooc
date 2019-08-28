<?php

namespace Mooc\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Mooc\Repositories\RegistrationCourseRepository;
use Mooc\Entities\RegistrationCourse;
use Mooc\Validators\RegistrationCourseValidator;

/**
 * Class RegistrationCourseRepositoryEloquent.
 *
 * @package namespace Mooc\Repositories;
 */
class RegistrationCourseRepositoryEloquent extends BaseRepository implements RegistrationCourseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RegistrationCourse::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RegistrationCourseValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
