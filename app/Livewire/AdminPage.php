<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\WithPagination;
use Toaster;

class AdminPage extends Component
{
    use WithPagination;

    public int $perPage = 10;
    public string $search = '';

    /**
     * @return RedirectResponse
     */
    public function mount(): mixed
    {
        if(!auth()->user()->admin) {
            Toaster::error('Only admin users can access the User Admin page.');
            return redirect(route('dashboard'));
        }
        return 0;
    }
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
