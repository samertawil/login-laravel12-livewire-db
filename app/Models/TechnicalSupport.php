<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnicalSupport extends Model
{
   protected $fillable=[
    'name' ,
    'user_name',
    'mobile',
     'subject_id',
    'issue_description',
    'region_id',
   ];
}
