<?php

namespace App\Services;


use App\Models\Citizen;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;



class CitizenRepository
{

    public function __construct()
    {
        //
    }

   


    public function getCachedCitizenId(int $citizen_id): Model
    {

        $data = Cache::remember("citizenData.$citizen_id", now()->addHours(24), function () use ($citizen_id) {
            return Citizen::findOrfail($citizen_id);
        });

        return $data;
    }
}
