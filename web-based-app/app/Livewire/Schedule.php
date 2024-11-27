<?php
namespace App\Livewire;

use App\Models\Planner;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Schedule extends Component
{
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
            ->where(function ($query) use ($month, $year) {
                $query->where('user_id', Auth::id())
                      ->orWhereNull('user_id');
            })
            ->whereMonth('planner_date', $month)
            ->whereYear('planner_date', $year)
            ->get();
    }

    public function render()
    {
        return view('livewire.schedule', ['planners' => $this->planners]);
    }
}
