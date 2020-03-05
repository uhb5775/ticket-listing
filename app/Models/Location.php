<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
// public function user(){
//         return $this->belongsTo('App\User');
// }
// public function location(){
//     return $this->belongsToMany('App\Models\Listing');
// }
public function orders()
{
    return $this->hasMany('App\Models\Order', 'location', 'location_id');
}
///!test///////////////////////////////////////
public function locsales()
{
    return $this->hasMany('App\Models\Wallet', 'location_id', 'location_id');      
}
public function salesz()
{
    return $this->hasMany('App\Models\Sales', 'location_id', 'location_id');      
}
}