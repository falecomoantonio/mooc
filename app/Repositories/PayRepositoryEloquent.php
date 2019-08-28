<?php

namespace Mooc\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Mooc\Repositories\PayRepository;
use Mooc\Entities\Pay;
use Mooc\Validators\PayValidator;

/**
 * Class PayRepositoryEloquent.
 *
 * @package namespace Mooc\Repositories;
 */
class PayRepositoryEloquent extends BaseRepository implements PayRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Pay::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PayValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
