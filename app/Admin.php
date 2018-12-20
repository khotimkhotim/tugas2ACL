<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
    use Notifiable;
    public function role(){
        return $this->belongsToMany(role::class,'role_admins');
    }
    /**
     * The attributes that are mass assignable.
     * @param string $token
     * @return void
     * @var array
     */


    public function sendPasswordResetNotification($token){
        $this->notify(new AdminResetPasswordNotification($token));
    }

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
}