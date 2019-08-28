<?php

namespace Mooc\Entities;

use App\Notifications\StudentResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mooc\Enums\UserStatus;
use Mooc\Traits\CryptId;

class Student extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use CryptId;

    protected $primaryKey = 'id';

    protected $table = 'students';

    protected $fillable = ['id','name', 'email', 'password','status_id'];

    protected $hidden = ['password', 'remember_token',];

    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $casts = [
        'created_at'=>'datetime',
        'updated_at'=>'datetime',
        'deleted_at'=>'datetime'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new StudentResetPassword($token));
    }

    public function status()
    {
        return $this->belongsTo(UserStatus::class,'status_id');
    }
}
