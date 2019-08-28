<?php

namespace Mooc\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Mooc\Repositories\SaleItemRepository;
use Mooc\Entities\SaleItem;
use Mooc\Validators\SaleItemValidator;

/**
 * Class SaleItemRepositoryEloquent.
 *
 * @package namespace Mooc\Repositories;
 */
class SaleItemRepositoryEloquent extends BaseRepository implements SaleItemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SaleItem::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SaleItemValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
