<?php

namespace App\Livewire\TechnicalSupport;

use Livewire\Component;
use Intervention\Image\Laravel\Facades\Image;
use App\Models\TechnicalSupport;
use Livewire\Attributes\Computed;

class Show extends Component
{

    #[Computed()]
    public function allData() {
        return TechnicalSupport::with(['statusSubjectName:id,status_name', 'statusIdName:id,status_name'])->
        orderBy('created_at','DESC')
        ->get();
       
    }

    

    public function render()
    {
       
        return view('livewire.technical-support.show');
    }
}

