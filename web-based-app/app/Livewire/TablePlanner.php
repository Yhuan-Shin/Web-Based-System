<?php

namespace App\Livewire;
use App\Models\Planner;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TablePlanner extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $currentMonth;
    public $currentYear;
    public $planners;

    public function mount()
    {
        $this->currentMonth = now()->month;
        $this->currentYear = now()->year;
        $this->planners = $this->getPlanners($this->currentMonth, $this->currentYear);
    }

    public function updateCalendar($month, $year)
    {
        $this->currentMonth = $month;
        $this->currentYear = $year;
        $this->planners = $this->getPlanners($month, $year);
    }

    public function goToPreviousMonth()
    {
        $date = Carbon::create($this->currentYear, $this->currentMonth, 1)->subMonth();
        $this->updateCalendar($date->month, $date->year);
    }

    public function goToNextMonth()
    {
        $date = Carbon::create($this->currentYear, $this->currentMonth, 1)->addMonth();
        $this->updateCalendar($date->month, $date->year);
    }

    protected function getPlanners($month, $year)
    {
        return Planner::query()
            ->whereMonth('planner_date', $month)
            ->whereYear('planner_date', $year)
            ->get();
    }
    public function render()
    { 
        $planners = Planner::paginate(10);
        return view('livewire.table-planner' ,[ 'planners' => $planners]);
    }
}
