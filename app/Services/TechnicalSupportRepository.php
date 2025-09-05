<?php

namespace App\Services;

use App\Models\TechnicalSupport;

class TechnicalSupportRepository
{
  
    public function __construct()
    {
        //
    }

    public function saveData(array $data) {
        TechnicalSupport::create($data);
    }

    public function getData() {
        return TechnicalSupport::with(['statusSubjectName:id,status_name', 'statusIdName:id,status_name'])->orderBy('created_at', 'DESC')
        ->get();
    }
}
