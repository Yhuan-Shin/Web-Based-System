<div wire:poll.3000ms>
    @if (session()->has('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    @foreach($students as $student)
    <div class="modal fade" id="profileModal{{$student->id}}" wire:ignore.self tabindex="-1" aria-labelledby="profileModalLabel{{$student->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel{{$student->id}}">Student Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Name: {{ $student->st_last_name }} {{ $student->st_first_name }} {{ $student->st_middle_name }}</p>
                    <p>Age: {{ $student->age }}</p>
                    <p>Gender: {{ $student->gender }}</p>
                    <p>Guardian: {{ $student->user ? ($student->user->last_name && $student->user->first_name ? $student->user->last_name . ', ' . $student->user->first_name : $student->user->google_name) : 'N/A' }}</p>
                    <p>Phone Number: {{ $student->user ? $student->user->phone_number : 'N/A' }}</p>
                    <p>Height: {{ $student->bmi ? $student->bmi->height : 'N/A' }} cm</p>
                    <p>Weight: {{ $student->bmi ? $student->bmi->weight : 'N/A' }} lbs</p>
                    <p>BMI: {{ $student->bmi ? $student->bmi->bmi : 'N/A' }}</p>
                    <p>Category: {{ $student->bmi ? $student->bmi->result : 'N/A' }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
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
    </div>
</div>
<div class="table responsive table-hover text-center">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Student No.</th>
                <th scope="col">Last Name</th>
                <th scope="col">First Name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">Grade</th>
                <th scope="col">Section</th>
                <th scope="col">Gender</th>
                <th scope="col">Age</th>
                <th scope="col">BMI</th>
                <th scope = "col">Category</th>
                <th scope="col">Profile</th>
                {{-- <th scope="col">Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$student->student_no}}</td>
                <td>{{$student->st_last_name}}</td>
                <td>{{$student->st_first_name}}</td>
                <td>{{$student->st_middle_name}}</td>
                <td>{{$student->grade}}</td>
                <td>{{$student->section}}</td>
                <td>{{$student->gender}}</td>
                <td>{{$student->age}}</td>
                <td>{{ $student->bmi ? $student->bmi->bmi : 'N/A' }}</td>
                <td>{{ $student->bmi ? $student->bmi->result : 'N/A' }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profileModal{{$student->id}}">
                        <i class="bi bi-eye"></i> See Profile
                    </button>

                   
                </td>
                {{-- <td>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateModal{{$student->id}}">
                        <i class="bi bi-pencil"></i> Update
                    </button>

                    <div class="modal fade" wire:ignore.self id="updateModal{{$student->id}}" tabindex="-1" aria-labelledby="updateModalLabel{{$student->id}}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel{{$student->id}}">Update Information</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.student.update', $student->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td> --}}
            </tr>
            @endforeach
          
        </tbody>
    </table>
    {{$students->links()}}
</div>


</div>
