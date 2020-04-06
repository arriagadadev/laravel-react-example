<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ["user_id"];
    protected $attributes = ["requested" => false];

    public static function getAll(){
        $tickets = (new static)::select(
            'tickets.id',
            'tickets.user_id',
            'tickets.requested',
            'users.name as user_name'
        )
        ->join('users', 'tickets.user_id', '=', 'users.id')
        ->orderBy('tickets.id','DESC')
        ->get();
        return $tickets;
    }
}
