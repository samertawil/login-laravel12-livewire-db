<?php

namespace App\Livewire\TechnicalSupport;

use Livewire\Component;
use Intervention\Image\Laravel\Facades\Image;
use App\Models\TechnicalSupport;
use Livewire\Attributes\Computed;

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
        return TechnicalSupport::with(['statusSubjectName:id,status_name', 'statusIdName:id,status_name'])->orderBy('created_at', 'DESC')
            ->get();
    }



    public function render()
    {

        return view('livewire.technical-support.show');
    }
}
