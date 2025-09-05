<?php

namespace App\Services;
use App\Models\AidCitizenAddress;


class CitizenAddressRepository
{

    public function __construct()
    {
        //
    }

    public function getCitizenAddressByIdc($idc)
    {
        return AidCitizenAddress::whereIdc($idc)->first();
    }

}
