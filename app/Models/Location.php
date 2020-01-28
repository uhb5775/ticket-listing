<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
public function user(){
        return $this->belongsTo('App\User');
}
public function location(){
    return $this->belongsToMany('App\Models\Listing');
}
}