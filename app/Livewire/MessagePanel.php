<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;

class MessagePanel extends Component
{
    public ?Message $message = null;
    public string $body = '';
    public string $title = '';
    public ?int $id = null;

    public function mount(Message $message): void {
        $this->message = $message;
        $this->body = $message->body;
        $this->title = $message->title;
        $this->id = $message->id;
    }

    public function editMessage($id) {
        dd('Here');
    }

    public function render()
    {
        return view('livewire.message-panel');
    }
}
