<?php

namespace App\Livewire\RegisterForAid;

use App\Models\Status;
use App\Models\Citizen;
use Livewire\Component;
use App\Models\Relation;
use Livewire\Attributes\Computed;
use App\Services\CacheModelServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class Create extends Component
{
    public   $personalData = '';
    public   $familyCount = '';
    public   $region_id;
    public   $city_id;
    public   $neighbourhood_id;

    public function mount()
    {
        $this->personalData = Citizen::findOrfail(Auth::user()->user_name);
        $this->familyCount = Relation::where('id_1', Auth::user()->user_name)->whereIn('type_cd', [287, 286])->count() + 1;
    }

    #[Computed()]
    public function statuses(): Collection
    {
        return cache()->remember(
            'statuses_filtered',
            3600,
            fn() =>
            Status::select('status_name', 'id', 'p_id_sub')
                ->whereIn('p_id_sub', [
                    config('myconstant.marital_status'),
                    config('myconstant.regions'),
                    config('myconstant.gender')
                ])->get()
        );
    }




    public function render()
    {

        $regions  = CacheModelServices::getRegionTableData();
        $cities  = CacheModelServices::getCityTableData();
        $neighbourhoods = CacheModelServices::getNeighbourhoodTableData();
       
        return view('livewire.register-for-aid.create', compact(['regions', 'cities', 'neighbourhoods']));
    }
}
