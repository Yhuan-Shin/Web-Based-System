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
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="Last Name, First Name, Middle Name" id="student_name" name="student_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="Grade" class="form-label">Grade</label>
                            <select class="form-select" id="grade" name="grade" required>
                                <option value="" disabled selected>Select Grade</option>
                                <option value="kinder">Kinder</option>
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
                                <option value="" disabled selected>Select Section</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
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
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
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
