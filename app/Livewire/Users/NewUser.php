<?php

namespace App\Livewire\Users;

use App\Models\Client;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class NewUser extends Component
{
    public string $name = "";
    public string $email = "";
    public ?int $clientId = null;
    public ?string $userType = "";
    public ?string $epsUserType = null;
    public bool $showEpsUserType = false;
    public bool $showClients = false;


    public function mount(): \Illuminate\Foundation\Application|int|Redirector|RedirectResponse|Application
    {
        if(auth()->user()->eps_user_type != 'admin') {
            Toaster::error('Only admin users can access the User Admin page.');
            return redirect(route('dashboard'));
        }
        return 0;
    }

    public function submit(): mixed
    {
        if($this->showClients && !$this->showEpsUserType) {
            $this->validate(rules: [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'clientId' => 'required'
            ],
                messages:[
                    'clientId' => 'Please select a Client'
                ]);
        } elseif(!$this->showClients && $this->showEpsUserType) {
            $this->validate(rules: [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'epsUserType' => 'required'
            ],
                messages: [
                    'epsUserType' => 'Please select an EPS User type.'
                ]);
        } else {
            $this->validate(rules:  [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'userType' => 'required',

            ],
                messages: [
                    'userType' => 'Please select a User type.'
                ]);
        }

        User::query()->create([
            'name' => $this->name,
            'email' => $this->email,
            'client_id' => $this->clientId,
            'eps_user_type' => $this->epsUserType,
            'password' => bcrypt($this->generateRandomString(15))
        ]);

        Toaster::success('You have successfully added a user.');
        return redirect(route('userAdminPage'));

    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
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

    public function render()
    {
        $clients = Client::query()->orderBy('name')->get();
        return view('livewire.users.new-user',[
            'clients' => $clients
        ]);
    }
}
