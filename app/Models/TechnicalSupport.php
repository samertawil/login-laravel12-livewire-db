<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TechnicalSupport extends Model
{

   protected $casts=[
      'uploaded_files'=>'json',
  
   ];

   
   protected $fillable = [
      'name',
      'user_name',
      'mobile',
      'subject_id',
      'issue_description',
      'region_id',
      'terminal_id',
      'uploaded_files',
   ];



 

   public function statusSubjectName(): BelongsTo
   {

      return $this->belongsTo(Status::class, 'subject_id', 'id');
   }


   public function statusIdName(): BelongsTo
   {

      return $this->belongsTo(Status::class, 'status_id', 'id');
   }
}
