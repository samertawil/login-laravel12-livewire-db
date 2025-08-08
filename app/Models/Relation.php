<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
  public static function getData(int $time, int $UserIdc) {
       
   return  Cache::remember('citizenFamilycount',now()->addHours((int) $time),function() use ($UserIdc) {
        return Relation::where('id_1', $UserIdc)->whereIn('type_cd', [287, 286])->count() + 1 ?? null;
    });
  }
}
