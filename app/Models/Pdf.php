<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
}
public function agent(){
    return $this->belongsToMany('App\Models\Listing');
}
}
