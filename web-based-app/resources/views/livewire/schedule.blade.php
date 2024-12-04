@php
     $firstDayOfMonth = \Carbon\Carbon::create($currentYear, $currentMonth, 1)->dayOfWeek;
     $daysInMonth = \Carbon\Carbon::create($currentYear, $currentMonth, 1)->daysInMonth;
@endphp
<div wire:poll.3000ms>
    {{-- Because she competes with no one, no one can compete with her. --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="header">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <button wire:click="goToPreviousMonth" class="btn btn-dark">Previous</button>
                        <h4>{{ \Carbon\Carbon::create($currentYear, $currentMonth, 1)->format('F Y') }}</h4>
                        <button wire:click="goToNextMonth" class="btn btn-primary">Next</button>
                    </div>
                </div>
                <div class="calendar shadow-sm p-3">
                    <div class="header">Sunday</div>
                    <div class="header">Monday</div>
                    <div class="header">Tuesday</div>
                    <div class="header">Wednesday</div>
                    <div class="header">Thursday</div>
                    <div class="header">Friday</div>
                    <div class="header">Saturday</div>
    
                    @php
                        $firstDayOfMonth = \Carbon\Carbon::create($currentYear, $currentMonth, 1)->dayOfWeek;
                        $daysInMonth = \Carbon\Carbon::create($currentYear, $currentMonth, 1)->daysInMonth;
                    @endphp
    
                    @for ($i = 0; $i < $firstDayOfMonth; $i++)
                        <div class="day empty"></div>
                    @endfor
    
                    @for ($i = 1; $i <= $daysInMonth; $i++)
                        <div class="day">
                            {{ $i }}
                            <br>
                            @foreach ($planners as $schedule)
                                @if ($schedule->planner_date->day == $i)
                                    <small>{{ $schedule->planner_date->format('g:i A') }}</small>
                                    <p class="mb-0 fw-bold">{{ $schedule->title }}</p>
                                    <small class="text-muted">{{ $schedule->description }}</small>
                                    <hr>                                   
                                @endif
                                
                            @endforeach  
                        </div>
                    @endfor
                    
                </div>
            </div>
        </div>
    </div>
   

    <style>
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
        }
        .calendar .day {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .calendar .header {
            font-weight: bold;
        }
        .calendar .day.empty {
            background-color: #f5f5f5;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            popoverTriggerList.map(function (popoverTriggerEl) {
                new bootstrap.Popover(popoverTriggerEl);
            });
        });
    </script>
</div>
