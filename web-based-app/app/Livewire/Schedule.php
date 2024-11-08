<?php

namespace App\Livewire;
use App\Models\Planner;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Schedule extends Component
{
    public function render()
    {
        if(Auth::user()){
            $planners = Planner::where('user_id', Auth::user()->id)
                ->orWhere('user_id', null) // Include planners for all users
                ->get();    
        }else{
            $planners = Planner::all(); // For non-authenticated users or fallback
        }
        return view('livewire.schedule',['planners' => $planners]);
    }
}
