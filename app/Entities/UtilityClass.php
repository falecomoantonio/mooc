<?php

namespace Mooc\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class UtilityClass.
 *
 * @package namespace Mooc\Entities;
 */
abstract class UtilityClass extends Model implements Transformable
{
    use TransformableTrait;

    protected $primaryKey = 'id';

    protected $table = 'utility_classes';

    protected $fillable = ['id','name','description','parent_id'];

    protected $dates = ['created_at','deleted_at','updated_at'];

    protected $casts = ['created_at'=>'datetime','deleted_at'=>'datetime','updated_at'=>'datetime'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
