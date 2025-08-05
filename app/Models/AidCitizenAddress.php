<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AidCitizenAddress extends Model
{
   protected $fillable=[
    'idc','region_id','city_id','neighbourhood_id','e_home_type','e_region_id','e_city_id','e_neighbourhood_id','e_full_address',
   ];
}
