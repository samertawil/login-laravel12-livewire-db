<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class AidCitizenRegistration extends Model
{
     protected $primaryKey='idc';

     protected $fillable=[
          'idc','full_name','birthday','mobile_primary','mobile_secondary','gender','marital_status','family_count','provider',
     ];

    
}
