<?php

namespace Mooc\Entities;

use Illuminate\Database\Eloquent\Model;
use Mooc\Enums\UserStatus;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Sale.
 *
 * @package namespace Mooc\Entities;
 */
class Sale extends Model implements Transformable
{
    use TransformableTrait;

    protected $primaryKey = 'id';

    protected $table = 'sales';

    protected $fillable = ['administrator_id','student_id','count_item','status_id','code','pay_method','os','browser','ip' ];

    protected $dates = ['created_at','deleted_at','updated_at'];

    protected $casts = ['created_at'=>'datetime','deleted_at'=>'datetime','updated_at'=>'datetime'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function administrator()
    {
        return $this->belongsTo(Administrator::class,'administrator_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function items()
    {
        return $this->hasMany(SaleItem::class,'sales_id');
    }


    public function status()
    {
        return $this->belongsTo(SaleS::class,'status_id');
    }

    public function pay()
    {
        return $this->belongsTo(Pay::class,'pay_method');
    }
}
