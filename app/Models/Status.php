<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
 

    protected $table = 'statuses';

    public  function statuses(): Collection
    {
        return cache()->remember(
            'statuses_filtered',
            3600,
            fn() =>
            Status::select('status_name', 'id', 'p_id_sub')
                ->whereIn('p_id_sub', [
                    config('myconstant.marital_status'),
                    config('myconstant.regions'),
                    config('myconstant.gender'),
                    config('myconstant.e_home_type'),
                ])->get()
        );
    }
}
