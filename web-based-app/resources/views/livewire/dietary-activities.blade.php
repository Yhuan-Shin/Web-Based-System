<div wire:poll.3000ms>
    {{-- In work, do what you enjoy. --}}
    <!-- Modal -->
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
    </div>
    <div class="modal fade"  wire:ignore id="createDietPlanModal" tabindex="-1"  aria-labelledby="createDietPlanModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createDietPlanModalLabel">Create Diet Plan and Activities</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                      
                        <div class="form-group mb-3">
                            <label for="diet-plan">Diet Plan</label>
                            <textarea class="form-control" wire:model="dietary" id="diet-plan" rows="3"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="activities">Activities</label>
                            <textarea class="form-control" wire:model="activities" id="activities" rows="3"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="category">Category</label>
                            <select class="form-select" id="category" name="category" wire:model="category" required>
                                <option value="">Select Category</option>
                                <option value="Severely Wasted">Severely Wasted</option>
                                <option value="Underweight">Underweight</option>
                                <option value="Normal">Normal</option>
                                <option value="Overweight">Overweight</option>
                                <option value="Obese">Obese</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Save changes</button>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" wire:model="search" id="search" placeholder="Search Student">
            </div>
            <div class="col-md-2">
                <select name="filter" wire:model="filter" class="form-select">
                    <option value="">Select Category</option>
                    <option value="Severely Wasted">Severely Wasted</option>
                    <option value="Underweight">Underweight</option>
                    <option value="Normal">Normal</option>
                    <option value="Overweight">Overweight</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select" id="grade" name="grade" wire:model="gradeFilter" required>
                    <option value="">Select Grade</option>
                    <option value="kinder">Kinder</option>
                    <option value="Grade1">Grade 1</option>
                    <option value="Grade2">Grade 2</option> 
                    <option value="Grade3">Grade 3</option>
                    <option value="Grade4">Grade 4</option>
                    <option value="Grade5">Grade 5</option>
                    <option value="Grade6">Grade 6</option>
                </select>
            </div>
            <div class="col-md">
                 <!-- Button trigger modal -->
                 <button type="button" class="btn btn-primary" wire:click="save" data-bs-toggle="modal" data-bs-target="#createDietPlanModal">
                    Create Diet Plan and Activities
                </button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="table responsive table-hover text-center table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student No.</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Section</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Age</th>
                        <th scope="col">BMI</th>
                        <th scope = "col">Category</th>
                        <th scope="col">Information</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$student->student_no}}</td>
                        <td>{{$student->st_last_name}}</td>
                        <td>{{$student->st_first_name}}</td>
                        <td>{{$student->grade}}</td>
                        <td>{{$student->section}}</td>
                        <td>{{$student->gender}}</td>
                        <td>{{$student->age}}</td>
                        <td>{{ $student->bmi ? $student->bmi->bmi : 'N/A' }}</td>
                        <td>{{ $student->bmi ? $student->bmi->result : 'N/A' }}</td>
                        <td>{{$student->dietary}}</td> 
                   
                    </tr>
                    @endforeach
                    {{$students->links()}}
                </tbody>
            </table>
        </div>
    </div>
</div>
