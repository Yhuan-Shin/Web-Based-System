<div wire:poll.3000ms> 
    
    <div class="form-group">
        <label for="student_no">Student No.</label>
        <input type="text" class="form-control" id="student_no" name="student_no" value="{{ old('student_no') }}" required>
        @error('student_no')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="full_name">Full Name</label>
        <input type="full_name" maxlength="30" class="form-control" placeholder="Last Name, First Name, Middle Name" id="child_full_name" name="student_name" value="{{ old('student_name') }}" required>
        @error('student_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="birthday"> Child's Date of Birth</label>
        <input type="date" class="form-control" id="child_birthday" wire:model="birthday" name="birthday" value="{{ old('birthday') }}" required>
        @error('birthday')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control" id="child_age" wire:model="age" name="age" value="{{ old('age') }}" min="1" required readonly>
        @error('age')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <select class="form-control" id="child_gender" name="gender" value="{{ old('gender') }}" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        @error('gender')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="grade"> Grade</label>
        <select class="form-control" id="child_grade" name="grade" value="{{ old('grade') }}" required>
            <option value="">Select Grade</option>
            <option value="kinder">Kinder</option>
            <option value="Grade1">Grade 1</option>
            <option value="Grade2">Grade 2</option>
            <option value="Grade3">Grade 3</option>
            <option value="Grade4">Grade 4</option>
            <option value="Grade5">Grade 5</option>
            <option value="Grade6">Grade 6</option>
        </select>
        @error('grade')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="section"> Section</label>
        <select class="form-control" id="child_section" name="section" value="{{ old('section') }}" required>
            <option value="">Select Section</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        @error('section')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
