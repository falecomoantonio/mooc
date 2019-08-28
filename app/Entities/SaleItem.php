<?php

namespace Mooc\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SaleItem.
 *
 * @package namespace Mooc\Entities;
 */
class SaleItem extends Model implements Transformable
{
    use TransformableTrait;

    protected $primaryKey = 'id';

    protected $table = 'sales';

    protected $fillable = ['sales_id','sku_id','sequence_number'];

    protected $dates = ['created_at','deleted_at','updated_at'];

    protected $casts = ['created_at'=>'datetime','deleted_at'=>'datetime','updated_at'=>'datetime'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class,'sales_id');
    }

    public function sku()
    {
        return $this->belongsTo(Sku::class,'sku_id');
    }
}
