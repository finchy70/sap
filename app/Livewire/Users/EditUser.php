<?php

namespace App\Livewire\Users;

use App\Models\Client;
use App\Models\User;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class EditUser extends Component
{
    public string $name = "";
    public string $email = "";
    public ?int $clientId = null;
    public ?string $userType = "";
    public ?string $epsUserType = null;
    public bool $showEpsUserType = false;
    public bool $showClients = false;
    public ?User $user = null;

    public function mount($user)
    {
        if(auth()->user()->eps_user_type != 'admin') {
            \Toaster::error("You can't edit your own profile.");
            return redirect()->back();
        } else {
            $this->user = $user;
            $this->name = $this->user->name;
            $this->email = $this->user->email;
            if($user->eps_user_type != null) {
                $this->userType = 'eps';
            } else {
                $this->userType = 'client';
            }
            $this->clientId = $this->user->client_id;
            $this->epsUserType = $this->user->eps_user_type;
            $this->updatedUserType();
        }

    }

    public function updatedUserType()
    {
        if($this->userType == 'eps') {
            $this->showEpsUserType = true;
            $this->showClients = false;
            $this->clientId = null;
        } elseif ($this->userType == 'client') {
            $this->showClients = true;
            $this->showEpsUserType = false;
            $this->epsUserType = null;
        }
    }

    public function submit(): mixed
    {
        if($this->showClients && !$this->showEpsUserType) {
            $this->validate(rules: [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$this->user->id,
                'clientId' => 'required'
            ],
                messages:[
                    'clientId' => 'Please select a Client'
                ]);
        } elseif(!$this->showClients && $this->showEpsUserType) {
            $this->validate(rules: [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$this->user->id,
                'epsUserType' => 'required'
            ],
                messages: [
                    'epsUserType' => 'Please select an EPS User type.'
                ]);
        } else {
            $this->validate(rules:  [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$this->user->id,
                'userType' => 'required',

            ],
                messages: [
                    'userType' => 'Please select a User type.'
                ]);
        }

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'client_id' => $this->clientId,
            'eps_user_type' => $this->epsUserType,
        ]);

        Toaster::success('You have successfully updated a user.');
        return redirect(route('userAdminPage'));

    }


    public function render()
    {
        $clients = Client::query()->orderBy('name')->get();

        return view('livewire.users.edit-user', [
            'clients' => $clients
        ]);
    }
}
