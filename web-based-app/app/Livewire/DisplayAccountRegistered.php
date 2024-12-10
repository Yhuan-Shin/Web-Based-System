<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;

class DisplayAccountRegistered extends Component
{
    public function approve($id)
    {
        $account = User::find($id);
        $account->update([
            'confirmed' => 1
        ]);
        session()->flash('message', 'Account approved');
    }
   
    public function render()
    {
        $account = User::all();
        return view('livewire.display-account-registered', ['accounts' => $account]);
    }
}
