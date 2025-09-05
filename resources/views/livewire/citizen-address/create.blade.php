<div>

    <div class="card-body ">
        <div class="form-group ">
            <div class="alert alert-custom alert-default py-1" role="alert">
                <div class="alert-icon"><i class="icon-2x text-success flaticon-home-2 mr-5"></i>بيانات السكن
                    الاصلية</div>
            </div>
        </div>

        <div class="row">


            <x-select wire:model.live='region_id' name="region_id"
                :options="$regions->where('id', '!=', 0)->pluck('region_name', 'id')" label req></x-select>


            <x-select wire:model.live='city_id' name="city_id" :options="$cities
            ->where('id', '!=', 0)
            ->where('region_id', $this->region_id)
            ->pluck('city_name', 'id')" label req></x-select>

            <x-select wire:model.live='neighbourhood_id' name="neighbourhood_id" :options="$neighbourhoods
            ->where('id', '!=', 0)
            ->where('city_id', $this->city_id)
            ->pluck('neighbourhood_name', 'id')" label req></x-select>


        </div>

    </div>


    <div class="card-body ">
        <div class="form-group ">
            <div class="alert alert-custom alert-default py-1" role="alert">
                <div class="alert-icon"><i class="icon-2x text-danger flaticon-home-2 mr-5"></i>بيانات الاقامة
                    الحالية </div>
            </div>
        </div>

        <div class="row">

 

            <x-select wire:model.live='e_home_type' name="e_home_type"
                :options="$statuses->pluck('status_name', 'id')"
                label req></x-select>

            <div style="{{$e_home_type ==41 ? 'display:none':''}}" class="col-lg-3 px-0">
                <x-select wire:model.live="e_region_id" name="e_region_id" divWidth="12"
                    :options="$regions->where('id', '!=', 0)->pluck('region_name', 'id')" label req></x-select>


            </div>


            <div style="{{$e_home_type==41 ? 'display:none' : ''}}" class="col-lg-3 px-0">
                <x-select wire:model.live='e_city_id' name="e_city_id" divWidth="12" :options="$cities
       ->where('id', '!=', 0)
       ->where('region_id', $this->e_region_id)
       ->pluck('city_name', 'id')" label req> </x-select>
            </div>
            <div style="{{$e_home_type==41 ? 'display:none' : ''}}" class="col-lg-3 px-0">
                <x-select wire:model.live='e_neighbourhood_id' name="e_neighbourhood_id" divWidth="12" :options="$neighbourhoods
       ->where('id', '!=', 0)
       ->where('city_id', $this->e_city_id)
       ->pluck('neighbourhood_name', 'id')" label req></x-select>

               
            </div>


<div style="{{$e_home_type==41 ? 'display:none' : ''}}" class="col-lg-6 px-0">
    <x-input wire:model='e_full_address' name="e_full_address" label req divWidth="12" req class="px-0"></x-input>
</div>

        </div>


    </div>
</div>