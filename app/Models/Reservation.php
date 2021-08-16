<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id', 'id');
    }


    public function service()
    {
        return $this->hasOne(Service::class, 'id', 'services_id');
    }
}
