<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = ['date'];
    // protected $table = 'orders';
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }
}
