<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;

class Dashboard extends Component
{

    public function render()
    {
        $messages = Message::query()->orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.dashboard', [
            'messages' => $messages
        ]);
    }
}
