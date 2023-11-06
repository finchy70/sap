<?php

namespace App\Livewire;

use Livewire\Component;

class NewMessage extends Component
{
    public string $body = "Hello";

    public function save(){
        dd($this);
    }

    public function render()
    {
        return view('livewire.new-message');
    }
}
