<?php

namespace App\Services;


 

use App\Models\Relation;
use Illuminate\Support\Facades\Cache;
 


class RelationRepository
{

    public function __construct()
    {
        //
    }

   


    public function getCachedRelationForId(int $citizen_id)
    {

        $data = Cache::remember("relationData.$citizen_id", now()->addHours(24), function () use ($citizen_id) {
           return Relation::where('id_1', $citizen_id)->whereIn('type_cd', [287, 286])->count() + 1 ?? null;
        });

        return $data;
    }
}
