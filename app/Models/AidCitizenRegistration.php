<?php

namespace App\Modules\Aid\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AidCitizenRegistration extends Model
{
    use HasFactory;

    protected $table='aid_citizen_registrations';

    protected $fillable=[
     
        'idc',
        'birthday',
        'mobile_primary',
        'mobile_secondary',
        'gender',
        'marital_status',
        // 'family_count_north',
        'family_count',
        'part_id',
        'area_id',
        'location_id',
        'couple_idc',
        'gov_regions_id',
        'gov_city_id',
        'gov_neighbourhood_id',
        'gov_location_id',
        'provider',
        'updated_by',
        'full_name',
        'benefits_status',
         
       
        ];

        protected $casts=[
            'couple_idc'=>'json',
        ];

       
    // public function maritalStatus() {
    //     return $this->hasOne(status::class,'id','marital_status');
    // }

    // public function part() {
    //     return $this->hasOne(AidPart::class,'id','part_id');
    // }

    // public function area() {
    //     return $this->hasOne(AidArea::class,'id','area_id');
    // }

    // public function location() {
    //     return $this->hasOne(AidLocation::class,'id','location_id');
    // }
     

    // public function benefits() {
    //     return $this->hasOne(status::class,'id','benefits_status');
    // }

}
