<?php

namespace App\Services;

// use App\Models\City;
use App\Models\City;
use App\Models\Region;
use Livewire\WithPagination;
use App\Models\Neighbourhood;
use Illuminate\Support\Facades\Cache;
 

class CacheModelServices
{

use WithPagination;
protected string $paginationTheme ='bootstrap';

public static function getRegionTableData(): mixed
    {
             
        return   Cache::rememberForever('RegionTableData', function () {
            return   Region::get();      
               
        });
    }


    public static function getCityTableData(): mixed
    {
             
        return   Cache::rememberForever('CityTableData', function () {
            return    City::get();      
               
        });
    }

 
    public static function getNeighbourhoodTableData(): mixed
    {
             
        return   Cache::rememberForever('NeighbourhoodTableData', function () {
            return   Neighbourhood::get();      
               
        });
    }

    
 
 
}

 