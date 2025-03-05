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
<div class="table responsive table-hover ">
    <table class="table table-striped">
        <thead class="text-center">
            <tr>
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
                <td> <img src="{{ asset('storage/' . $student->profile_pic) }}" alt="Profile Picture" class="img-fluid" style="width: 100px; height: 100px;">
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
                </td>
            </tr>
            <div class="modal fade" wire:ignore.self id="updateModal{{$student->id}}" tabindex="-1" aria-labelledby="updateModalLabel{{$student->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" x-data="{
                        birthday: '{{ $student->birthday }}',
                        age: {{ $student->age }},
                        ageError: '',
                        calculateAge() {
                            const birthDate = new Date(this.birthday);
                            const today = new Date();
                            let calculatedAge = today.getFullYear() - birthDate.getFullYear();
                            const monthDifference = today.getMonth() - birthDate.getMonth();
                            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                                calculatedAge--;
                            }
                            this.age = calculatedAge;
    
                            // Validate age
                            if (this.age < 5 || this.age > 12) {
                                this.ageError = 'Age must be between 5 and 12 years.';
                            } else {
                                this.ageError = ''; // Clear error if age is valid
                            }
                        }
                    }">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateModalLabel{{$student->id}}">Update Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <div class="container">
                                       
                                    </div>
                                    <label for="profile_pic">Profile Picture</label>
                                    @if ($student->profile_pic)
                                        {{-- <img src="{{ asset('storage/' . $student->profile_pic) }}" alt="Profile Picture" class="img-fluid" style="width: 100px; height: 100px;"> --}}
                                        <span class="badge bg-success p-2">Image Uploaded</span>
                                    @else
                                        <span class="badge bg-warning p-2"> No Profile Picture</span>
                                    @endif
                                    <input type="file" class="form-control mt-2" id="profile_pic" name="profile_pic" value="{{ $student->profile_pic }}" accept="image/*" required>
                                    @error('profile_pic')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="student_no" class="form-label">Student No.</label>
                                    <input type="text" class="form-control" id="student_no" name="student_no" value="{{ $student->student_no }}" required>
                                    @error('student_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="st_last_name" value="{{ $student->st_last_name }}" required>
                                    @error('st_last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="st_first_name" value="{{ $student->st_first_name }}" required>
                                    @error('st_first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="middle_name" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="middle_name" name="st_middle_name" value="{{ $student->st_middle_name }}" required>
                                    @error('st_middle_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="Grade" class="form-label">Grade</label>
                                    <select class="form-select" id="grade" name="grade" required>
                                        <option value="{{ $student->grade }}" selected>{{ $student->grade }}</option>
                                        <option value="Kinder">Kinder</option>
                                        <option value="Grade1">Grade 1</option>
                                        <option value="Grade2">Grade 2</option>
                                        <option value="Grade3">Grade 3</option>
                                        <option value="Grade4">Grade 4</option>
                                        <option value="Grade5">Grade 5</option>
                                        <option value="Grade6">Grade 6</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="section" class="form-label">Section</label>
                                    <select class="form-select" id="section" name="section" required>
                                        <option value="{{ $student->section }}" selected>{{ $student->section }}</option>
                                        <option value="Section 1">1</option>
                                        <option value="Section 2">2</option>
                                        <option value="Section 3">3</option>
                                        <option value="Section 4">4</option>
                                        <option value="Section 5">5</option>
                                        <option value="Section 6">6</option>
                                    </select>
                                    @error('section')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="childDOB" class="form-label">Child's Date of Birth</label>
                                    <input type="date" class="form-control" id="date" x-model="birthday" @change="calculateAge()" name="birthday" value="{{$student->birthday}}"     required>
                                    
                                    @error('birthday')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
        
                                <div class="mb-3">
                                    <label for="childAge" class="form-label">Child's Age</label>
                                    <input type="number" class="form-control" id="age" name="age" x-model="age" value="{{ $student->age }}" min="1" readonly>
                                    @error('age')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <!-- Error message -->
                                    {{-- <p x-show="ageError !== ''" class="text-danger">{{ ageError }}</p> --}}
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender" name="gender" required>
                                        <option value="{{ $student->gender }}" selected>{{ $student->gender }}</option>
                                        <option value="Male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
        
                                <!-- Disable button if age error exists -->
                                <button type="submit" class="btn btn-primary float-end">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
          
        </tbody>
    </table>
    {{$students->links()}}
</div>


</div>
