<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type_id'
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

    public static function getUsers(){
        return (new static)::select('id','name', 'email')
        ->where('user_type_id', 2) // 1: Admin, 2: User
        ->get();
    }

    public function myTickets(){
        return Ticket::select('id', 'requested', 'user_id')
            ->where('user_id', $this->id)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function hasUserType($userType){
        return $this->user_type_id == $userType;
    }
}
