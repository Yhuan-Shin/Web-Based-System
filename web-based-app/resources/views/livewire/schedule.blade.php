@php
     $firstDayOfMonth = \Carbon\Carbon::create($currentYear, $currentMonth, 1)->dayOfWeek;
     $daysInMonth = \Carbon\Carbon::create($currentYear, $currentMonth, 1)->daysInMonth;
@endphp

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="header">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <button wire:click="goToPreviousMonth" class="btn btn-secondary">Previous</button>
                    <h4>{{ \Carbon\Carbon::create($currentYear, $currentMonth, 1)->format('F Y') }}</h4>
                    <button wire:click="goToNextMonth" class="btn btn-secondary">Next</button>
                </div>
            </div>
            <div class="calendar">
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
                                <button class="btn btn-sm btn-primary"  data-bs-trigger="hover" data-bs-toggle="popover" data-bs-content="{{ $schedule->description }}"  data-bs-html="true">See More</button>
                                <hr>
                            @endif
                        @endforeach
                    </div>
                @endfor
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
            background-color: #f5f5f5;
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


