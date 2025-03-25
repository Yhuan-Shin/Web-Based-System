<div wire:poll.3000ms>
    <!-- Child's Update Modal -->
    @foreach ($students as $child)
    <div class="modal fade" wire:ignore.self id="childEditModal{{ $child->id }}" tabindex="-1" aria-labelledby="childInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" x-data="{
                    birthday: '{{ $child->birthday }}',
                    age: {{ $child->age }},
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
                    <h5 class="modal-title" id="childInfoModalLabel">Child Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Child's Information content goes here -->
                    <form action="{{ route('student.update', $child->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <div class="container">
                                @if ($child->profile_pic)
                                    <img src="{{ asset('/' . $child->profile_pic) }}" alt="Profile Picture" class="img-fluid" style="width: 100px; height: 100px;">
                                @else
                                    <span class="badge bg-warning"> No Profile Picture</span>
                                @endif
                            </div>
                            {{-- <label for="profile_pic">Profile Picture</label>
                            <input type="file" class="form-control" id="profile_pic" name="profile_pic" value="{{ $child->profile_pic }}" accept="image/*" required> --}}
                            @error('profile_pic')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="student_no" class="form-label">Student No.</label>
                            <input type="text" class="form-control" id="student_no" name="student_no" value="{{ $child->student_no }}" readonly required>
                            @error('student_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="st_last_name" value="{{ $child->st_last_name }}" readonly required>
                            @error('st_last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="st_first_name" value="{{ $child->st_first_name }}" readonly required>
                            @error('st_first_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middle_name" name="st_middle_name" value="{{ $child->st_middle_name }}" readonly required>
                            @error('st_middle_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Grade" class="form-label">Grade</label>
                            <select class="form-select" id="grade" readonly name="grade" required>
                                <option value="{{ $child->grade }}" selected>{{ $child->grade }}</option>
                                <option value="Kinder">Kinder</option>
                                <option value="Grade 1">Grade 1</option>
                                <option value="Grade 2">Grade 2</option>
                                <option value="Grade 3">Grade 3</option>
                                <option value="Grade 4">Grade 4</option>
                                <option value="Grade 5">Grade 5</option>
                                <option value="Grade 6">Grade 6</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="section" class="form-label">Section</label>
                            <select class="form-select" id="section" readonly name="section" required>
                                <option value="{{ $child->section }}" selected>{{ $child->section }}</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                            @error('section')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="childDOB" class="form-label">Child's Date of Birth</label>
                            <input type="date" class="form-control" readonly id="date" x-model="birthday" @change="calculateAge()"  name="birthday" required>
                            @error('birthday')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="childAge" class="form-label">Child's Age</label>
                            <input type="number" class="form-control" readonly id="age" name="age" x-model="age" value="{{ $child->age }}" min="1" required readonly>
                            @error('age')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <!-- Error message -->
                            {{-- <p x-show="ageError !== ''" class="text-danger">{{ ageError }}</p> --}}
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender" readonly required>
                                <option value="{{ $child->gender }}" selected>{{ $child->gender }}</option>
                                <option value="Male" {{ $child->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $child->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Disable button if age error exists -->
                        {{-- <button type="submit" class="btn btn-primary float-end">Update</button> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
