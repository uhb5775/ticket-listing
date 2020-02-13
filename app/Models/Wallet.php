<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    // public function orders()
    // {
    //     return $this->hasMany('App\Models\Order', 'location', 'location_id');
    // }
    public function wall()
{
    return $this->belongsTo('App\Models\Location');      
}
}
