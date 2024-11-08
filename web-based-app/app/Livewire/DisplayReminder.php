<?php

namespace App\Livewire;
use App\Models\Reminder;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class DisplayReminder extends Component
{
    public function deleteReminder($id)
    {
        $reminder = Reminder::find($id);
        $reminder->delete();
        session()->flash('message', 'Reminder deleted successfully.');
    }
    public function render()
    {
        if (Auth::user()) {
            $reminders = Reminder::where('user_id', Auth::user()->id)
                ->orWhere('user_id', null) // Include reminders for all users
                ->get();
        } else {
            $reminders = Reminder::all(); // For non-authenticated users or fallback
        }
    
        return view('livewire.display-reminder', ['reminders' => $reminders]);
    }
    

}
