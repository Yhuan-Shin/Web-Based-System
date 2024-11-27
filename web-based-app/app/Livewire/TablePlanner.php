<?php

namespace App\Livewire;
use App\Models\Planner;
use Livewire\Component;

class TablePlanner extends Component
{


    public function render()
    { 
        $planners = Planner::all();
        return view('livewire.table-planner' ,[ 'planners' => $planners]);
    }
}
