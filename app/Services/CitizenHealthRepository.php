<?php
namespace App\Services;
use App\Models\AidCitizenHealth;

class CitizenHealthRepository
{


    public function __construct()
    {
        //
    }

    public function getCitizenHealthByIdc($idc)
    {
        return AidCitizenHealth::whereIdc( $idc)->first();
    }
}
 