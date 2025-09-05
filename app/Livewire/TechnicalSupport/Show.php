<?php

namespace App\Livewire\TechnicalSupport;

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Services\TechnicalSupportRepository;


class Show extends Component
{
    public $notifications;

    public function mount()
    {
        $this->loadNotifications();
    }

    public function loadNotifications()
    {

        $user = auth()->user();
        if ($user) {
            $this->notifications = $user->unreadNotifications()->get();
        } else {
            $this->notifications = collect();
        }
    }

    public function markAsRead(string $id)
    {
        $user = auth()->user();

        if ($user) {

            $notification = $user->unreadNotifications()->find($id);

            if ($notification) {
                $notification->markAsRead();
                $this->loadNotifications(); // Refresh notifications
            }
        } else {
            $this->notifications = collect();
        }
    }

    public function refreshNotifications()
    {
        $user = auth()->user();
        if ($user) {
            $this->notifications = $user->unreadNotifications()->get();
        } else {
            $this->notifications = collect();
        }
    }

    #[Computed()]
    public function allData()
    {
        $technicalSupportREpo= new TechnicalSupportRepository();

      $data=  $technicalSupportREpo->getData();

      return $data;
    }



    public function render()
    {

        return view('livewire.technical-support.show');
    }
}
