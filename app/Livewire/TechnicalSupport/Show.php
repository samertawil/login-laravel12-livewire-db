<?php

namespace App\Livewire\TechnicalSupport;

use Livewire\Component;
use App\Models\TechnicalSupport;
use Livewire\Attributes\Computed;

class Show extends Component
{

    #[Computed()]
    public function allData() {
        return TechnicalSupport::get();
    }

    public function render()
    {
        return view('livewire.technical-support.show');
    }
}
