<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;

class AccountRegistered extends Component
{
    public function render()
    {
        $account = User::all();
        return view('livewire.account-registered',['account' => $account]);
    }
}
