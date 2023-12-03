<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminPage extends Component
{
    use WithPagination;

    public int $perPage = 10;
    public string $search = '';

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin-page', [
            'users' => User::query()->search($this->search)->orderBy('name')->paginate($this->perPage)
        ]);
    }
}
