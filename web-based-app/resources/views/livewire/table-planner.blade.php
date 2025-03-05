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
    @foreach($planners as $schedule)
    <div class="modal fade" id="editModal{{ $schedule->id }}" wire:ignore.self tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Planner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('planner.update', $schedule->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" wire:model="title" value="{{ $schedule->title }}" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="planner_date" class="form-label">Date</label>
                            <input type="datetime-local" class="form-control" id="planner_date" wire:model="planner_date" value="{{ $schedule->planner_date }}" name="planner_date">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" wire:model="description" value="{{ $schedule->description }}" name="description"></input>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal{{ $schedule->id }}" wire:ignore.self tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Planner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this planner?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('planner.destroy', $schedule->id) }}" method="POST">
                        @csrf @method('DELETE')<button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="container">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#plannerModal">Add Planner</button>
            </div>
        </div>
    </div>
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
                                    {{-- @foreach ($planners as $planner) --}}
                                    <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#editModal{{ $schedule->id }}">Edit</button>
                                    <button data-bs-toggle="modal" data-bs-target="#deleteModal{{ $schedule->id }}
                                        " class="btn btn-danger mb-2">Delete</button>
                                    {{-- @endforeach --}}
                                   
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
