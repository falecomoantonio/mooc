<?php

namespace Mooc\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Mooc\Enums\SkuStatus;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Sku.
 *
 * @package namespace Mooc\Entities;
 */
class Sku extends Model implements Transformable
{
    use TransformableTrait;

    protected $primaryKey = 'id';

    protected $table = 'skus';

    protected $fillable = ['course_id','price','status_id'];

    protected $dates = ['created_at','deleted_at','updated_at'];

    protected $casts = ['created_at'=>'datetime','deleted_at'=>'datetime','updated_at'=>'datetime'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
