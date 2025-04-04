<div wire:poll.3000ms>
    @if (session()->has('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    @if (session()->has('success'))
    <div class="alert alert-sucess">
        {{ session('success') }}
    </div>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('success') }}
    </div>
    @endif
    
@include('components.modal.student.view-profile')
@livewire('add-child')
@livewire('b-m-i-calculator')

{{-- Filter --}}
<div class="container mb-4">
    <div class="row">
        <div class="col-md-3">
            <input type="text" name="search" class="form-control" wire:model="search" id="search" placeholder="Search Student">
        </div>
        <div class="col-md-2">
            <select name="filter" wire:model="filter" class="form-select">
                <option value="">Select Category</option>
                <option value="Severely Wasted">Severely Wasted</option>
                <option value="Underweight">Underweight</option>
                <option value="Normal">Normal</option>
                <option value="Obese">Obese</option>
                <option value="Overweight">Overweight</option>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-select" id="grade" name="
            rade" wire:model="gradeFilter" required>
                <option value="">Select Grade</option>
                <option value="Kinder">Kinder</option>
                <option value="Grade 1">Grade 1</option>
                <option value="Grade 2">Grade 2</option> 
                <option value="Grade 3">Grade 3</option>
                <option value="Grade 4">Grade 4</option>
                <option value="Grade 5">Grade 5</option>
                <option value="Grade 6">Grade 6</option>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-select" id="section" name="section" wire:model="sectionFilter" required>
                <option value="">Select Section</option>
                <option value="Section A">Section A</option>
                <option value="Section B">Section B</option>
                <option value="Section C">Section C</option>
                <option value="Section D">Section D</option>
                <option value="Section E">Section E</option>
                <option value="Section F">Section F</option>
            </select>
        </div>
        <div class="col">
              
            
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-success" style="white-space: nowrap;"  data-bs-toggle="modal" data-bs-target="#childAddModal" >Add Student</button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#bmiModal" style="white-space: nowrap;">BMI Calculator</button>
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="table responsive table-hover ">
    <table class="table table-striped">
        <thead class="text-center">
            <tr style="white-space: nowrap;">
                <th scope="col">#</th>
                <th scope="col">Student No.</th>
                <th scope="col">Profile Picture</th>
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
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody style="white-space: nowrap;">
            @foreach($students as $student)
            <tr class="text-center">
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$student->student_no}}</td>
                <td> <img src="{{ asset('/' . $student->profile_pic) }}" alt="Profile Picture" class="img-fluid" style="width: 50px; height: 50px;">
                </td>
                <td>{{$student->st_last_name}}</td>
                <td>{{$student->st_first_name}}</td>
                <td>{{$student->st_middle_name}}</td>
                <td>{{$student->grade}}</td>
                <td>{{$student->section}}</td>
                <td>{{$student->gender}}</td>
                <td>{{$student->age}}</td>
                <td>
                    @if ($student->bmi)
                        {{ $student->bmi->bmi }}
                    @else
                        <span class="badge bg-danger">No Record</span>
                    @endif
                </td>
                <td>{{ $student->bmi ? $student->bmi->result : 'N/A' }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profileModal{{$student->id}}">
                        <i class="bi bi-eye"></i> See Profile
                    </button>

                   
                </td>
                <td>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateModal{{$student->id}}">
                        <i class="bi bi-pencil"></i> Update
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$student->id}}">
                        <i class="bi bi-trash"></i> Delete
                    </button>

                    @include('components.modal.student.confirm-delete-student')
                </td>
            </tr>
                    @include('components.modal.student.update-student')
            @endforeach
          
        </tbody>
    </table>
    {{$students->links()}}
</div>


</div>
