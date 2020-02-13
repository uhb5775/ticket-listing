<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // protected $fillable = [
    //     'ename', 'event', 'price', 'quantity', 'total'
    // ];

//     public function user(){
//         return $this->belongsTo('App\User');
// }
// public function order(){
//     return $this->belongsToMany('App\Models\Listing');
// }
public function wallet()
{
    return $this->belongsTo('App\Models\Location');      
}
}
