<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
   protected $table='ssn_login_ques_tb';

   protected $primaryKey='idc';

   public static function getData(int $time=24,int $UserIdc) {
   
      return Cache::remember('citizenPersonalData',now()->addHours((int) $time), 
      function () use ($UserIdc){
        return Citizen::findOrfail($UserIdc) ?? null; 
      });
   }
}
