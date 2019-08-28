<?php

namespace Mooc\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Mooc\Repositories\SaleRepository;
use Mooc\Entities\Sale;
use Mooc\Validators\SaleValidator;

/**
 * Class SaleRepositoryEloquent.
 *
 * @package namespace Mooc\Repositories;
 */
class SaleRepositoryEloquent extends BaseRepository implements SaleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Sale::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SaleValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
