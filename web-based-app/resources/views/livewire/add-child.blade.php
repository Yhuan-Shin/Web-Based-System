<div wire:poll.3000ms >
    <!-- Child's Add Modal -->
    <div class="modal fade" id="childAddModal" wire:ignore.self tabindex="-1" aria-labelledby="childAddModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="childAddModalLabel">Add Child's Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Child's Information content goes here -->
                    <form action="{{ route('student.submit') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="studentNo" class="form-label">Student No.</label>
                            <input type="text" class="form-control" id="student_no" name="student_no" required>
                        </div>
                        <div class="mb-3">
                            <label for="childSurname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="surname" name="lname" required>
                        </div>
                        <div class="mb-3">
                            <label for="childName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="name" name="fname" required>
                        </div>
                        <div class="mb-3">
                            <label for="childMiddleName" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="childMiddleName" name="mname" required>
                        </div>
                        <div class="mb-3">
                            <label for="childDOB" class="form-label">Child's Date of Birth</label>
                            <input type="date" class="form-control" id="date" wire:model="birthday" name="birthday" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="childAge" class="form-label">Child's Age</label>
                            <input type="number" class="form-control" id="age" name="age" wire:model="age" min="1" required  readonly >
                            @error('age') 
                                <span class="text-danger">{{ $message }}</span> 
                              
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="childGender" class="form-label">Child's Gender</label>
                            <select class="form-select" id="childGender" name="gender" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <input type="submit" id="submitBtn" class="btn btn-primary float-end" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('submitBtn').disabled = true;
    </script>
</div>
