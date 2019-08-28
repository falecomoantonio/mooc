<?php

namespace Mooc\Entities;

use Illuminate\Database\Eloquent\Model;
use Mooc\Enums\CourseStatus;
use Mooc\Enums\SkuStatus;
use Mooc\Enums\UserStatus;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Course.
 *
 * @package namespace Mooc\Entities;
 */
class Course extends Model implements Transformable
{
    use TransformableTrait;

    protected $primaryKey = 'id';

    protected $table = 'courses';

    protected $fillable = ['title','banner','description','duraction','level','status_id','type','create_by','category_id'];

    protected $dates = ['created_at','deleted_at','updated_at'];

    protected $casts = ['created_at'=>'datetime','deleted_at'=>'datetime','updated_at'=>'datetime'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function category()
    {
        return $this->belongsTo(CategoryCourse::class,'category_id');
    }

    public function administrator()
    {
        return $this->belongsTo(Administrator::class,'create_by');
    }


    public function status()
    {
        return $this->belongsTo(CourseStatus::class,'status_id');
    }

    public function skus()
    {
        return $this->hasMany(Sku::class,'course_id');
    }

    public function currentSku()
    {
        return $this->hasMany(Sku::class,'course_id')
                    ->where('status','=',SkuStatus::ACTIVE)->firstOr(function(){ return null; });
    }
}
