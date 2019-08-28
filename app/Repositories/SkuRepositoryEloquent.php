<?php

namespace Mooc\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Mooc\Repositories\SkuRepository;
use Mooc\Entities\Sku;
use Mooc\Validators\SkuValidator;

/**
 * Class SkuRepositoryEloquent.
 *
 * @package namespace Mooc\Repositories;
 */
class SkuRepositoryEloquent extends BaseRepository implements SkuRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Sku::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SkuValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
