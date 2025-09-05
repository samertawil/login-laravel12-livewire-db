<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingRepository
{
   
    public function __construct()
    {
        //
    }

    public function getCachedDataWithTime(int $cacheHours=24)
    {
     return Cache::remember('setting_cached_data',$cacheHours, function () {
           return Setting::all();
        });

   }
}
