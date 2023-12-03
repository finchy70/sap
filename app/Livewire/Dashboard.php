<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{

    public function render()
    {
        $messages = Message::query()->orderBy('created_at', 'desc')->paginate(5);

        return view('livewire.dashboard', [
            'messages' => $messages,
        ]);
    }
}
