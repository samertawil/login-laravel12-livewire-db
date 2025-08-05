<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
   protected $connection='mysql_dashboard';

   protected $table='settings';

    public function getData()
     {
      return Cache::remember('setting_cached_data', now()->addHours(24), function () {
            return Setting::all();
         });

    }
  


}
