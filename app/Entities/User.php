<?php


namespace Mooc\Entities;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use \Illuminate\Notifications\Notifiable;

}
