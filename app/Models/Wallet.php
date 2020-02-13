<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
public function user(){
        return $this->belongsTo('App\User');
}
public function order(){
    return $this->belongsToMany('App\Models\Listing');
}
}
