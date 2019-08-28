<?php

namespace Mooc\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Mooc\Repositories\UtilityClassRepository;
use Mooc\Entities\UtilityClass;
use Mooc\Validators\UtilityClassValidator;

/**
 * Class UtilityClassRepositoryEloquent.
 *
 * @package namespace Mooc\Repositories;
 */
class UtilityClassRepositoryEloquent extends BaseRepository implements UtilityClassRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UtilityClass::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UtilityClassValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
