<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

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
    public function decline($id)
    {
        $account = User::find($id);
        $account->delete();
        session()->flash('message', 'Account deleted');
    }
    public function render(){
        $account = User::with('students')->where('id', '!=', Auth::id())->get();
        return view('livewire.display-account-registered', ['accounts' => $account]);
    }
    public function deactivate($id){
        $account = User::find($id);
        $account->update([
            'confirmed' => 0
        ]);
        session()->flash('message', 'Account deactivated');
    }
}
