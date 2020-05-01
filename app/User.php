<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\UserRoles;

/**
 * Class User
 * @package App
 * @property integer $user_role_id
 * @property string $name
 * @property string $email
 * @property string $password
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getRole()
    {
        return UserRoles::getUserRole($this->user_role_id);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'user_id', 'id');
    }
}
