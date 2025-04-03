<div wire:poll.3000ms >
    <!-- Child's Add Modal -->
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
    @endif
    
    <div class="modal fade" id="childAddModal" wire:ignore.self tabindex="-1" aria-labelledby="childAddModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" 
                x-data="{
                    birthday: '',
                    age: '',
                    ageError: '',
                    calculateAge() {
                        if (!this.birthday) return;
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
                    <h5 class="modal-title" id="childAddModalLabel">Add Student's Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Child's Information content goes here -->
                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label for="profile_pic">Profile Picture</label>

                            <input type="file" class="form-control" id="profile_pic" name="profile_pic" accept="image/*" wire:model="profile_pic" required>
                            @error('profile_pic') 
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="studentNo" class="form-label">Student No.</label>

                            <input type="text" wire:model="student_no" class="form-control" id="student_no" name="student_no" pattern="\d{12}" maxlength="12" placeholder="Student No. should be 12 digits" required>
                            @error('student_no') 
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            
                            <input type="text" wire:model="st_last_name" class="form-control" placeholder="Last Name" id="last_name" name="st_last_name" required>
                            @error('last_name') 
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>

                            <input type="text" wire:model="st_first_name" class="form-control" placeholder="First Name" id="first_name" name="st_first_name" required>
                            @error('first_name') 
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="middleName" class="form-label">Middle Name</label>

                            <input type="text" class="form-control" wire:model="st_middle_name" placeholder="Middle Name" id="middle_name" name="st_middle_name" required>
                            @error('middle_name') 
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Allergies">Allergies</label>
                            <input type="text" class="form-control" wire:model="allergies" placeholder="Allergies" id="allergies" name="allergies">
                        </div>
                        <div class="mb-3">
                            <label for="religion">Religion</label>
                            <input type="text" class="form-control" wire:model="religion" placeholder="Religion" id="religion" name="religion" required>
                        </div>
                        <div class="mb-3">
                            <label for="health_condition">Health Condition</label>
                            <input type="text" class="form-control" wire:model="health_condition" placeholder="Health Condition" id="health_conditions" name="health_condition">
                        </div>
                        <div class="mb-3">
                            <label for="Grade" class="form-label">Grade</label>

                            <select class="form-select" id="grade"  wire:model="grade" name="grade" required>
                                <option value=""  selected>Select Grade</option>
                                <option value="Kinder">Kinder</option>
                                <option value="Grade 1">Grade 1</option>
                                <option value="Grade 2">Grade 2</option> 
                                <option value="Grade 3">Grade 3</option>
                                <option value="Grade 4">Grade 4</option>
                                <option value="Grade 5">Grade 5</option>
                                <option value="Grade 6">Grade 6</option>
                            </select>
                            @error('grade') 
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="section"  class="form-label">Section</label>

                            <select class="form-select" wire:model="section" id="section" name="section" required>
                                <option value=""  selected>Select Section</option>
                                <option value="Section A">Section A</option>
                                <option value="Section B">Section B</option>
                                <option value="Section C">Section C</option>
                                <option value="Section D">Section D</option>
                                <option value="Section E">Section E</option>
                                <option value="Section F">Section F</option>
                            </select>
                            @error('section') 
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="childDOB" class="form-label">Child's Date of Birth</label>

                            <input type="date" class="form-control" id="date" wire:model="birthday" name="birthday" 
                            x-model="birthday" @change="calculateAge()" required>
                            @error('birthday') 
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="childAge" class="form-label">Child's Age</label>

                            <input type="number" x-model="age" class="form-control" id="age" name="age" wire:model="age" min="1" required  readonly >
                            @error('age') 
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="childGender" class="form-label">Child's Gender</label>

                            <select class="form-select" wire:model="gender"  id="childGender" name="gender" required>
                                <option value=""  selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @error('gender') 
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="parent">Parent/Guardian</label>
                            <select class="form-select" id="parent" wire:model="parent" name="parent" required>
                                <option value=""  selected>Select Parent/Guardian</option>
                                @foreach ($parents as $parent)
                                    <option value="{{ $parent->id }}">{{ $parent->first_name }} {{ $parent->last_name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary float-end"  >Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</div>
