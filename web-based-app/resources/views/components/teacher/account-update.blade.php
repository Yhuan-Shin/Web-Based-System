<div class="card">
    <div class="card-header">
        <h4>Update Account</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('teacher.account.update', Auth::user()->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="last_name" class="form-label text-muted">Last Name</label>
                <input type="text" class="form-control" id="name" name="last_name" value="{{ Auth::user()->last_name }}" required>
                @error('last_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            <div class="form-group">
                <label for="first_name" class="form-label text-muted">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ Auth::user()->first_name }}" required>
                @error('first_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="middle_name" class="form-label text-muted">Middle Name</label>
                <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ Auth::user()->middle_name }}">
                @error('middle_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            </div>
            <div class="form-group">
                <label for="email" class="form-label text-muted">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="section" class="form-label">Section</label>
                <select class="form-control" id="section" name="section"  required>
                    <option value="{{ Auth::user()->section}}"" selected disabled>{{ Auth::user()->section}}</option> 
                    <option value="Section A">Section A</option>
                    <option value="Section B">Section B</option>
                    <option value="Section C">Section C</option>
                    <option value="Section D">Section D</option>
                    <option value="Section E">Section E</option>
                    <option value="Section F">Section F</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phone" class="form-label text-muted">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone_number" value="{{ Auth::user()->phone_number }}" required>
                @error('phone_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address" class="form-label text-muted">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}" required>
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        <div class="form-group">
            <label for="password" class="form-label text-muted">Password</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" id="password" name="password" value="" aria-describedby="basic-addon1" placeholder="Leave blank if you don't want to change your password" >
                <div class="input-group-append">
                    <span class="input-group-text" id="toggle-password" style="cursor: pointer;"><i class="bi bi-eye-slash-fill"></i></span>
                </div>
            </div>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="form-label text-muted">Confirm Password</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Leave blank if you don't want to change your password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" aria-describedby="basic-addon1" >

                <div class="input-group-append">
                    <span class="input-group-text" id="toggle-password-confirm" style="cursor: pointer;"><i class="bi bi-eye-slash-fill"></i></span>
                </div>
            </div>
            @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div id="password_error" style="color: red; display: none;">Passwords do not match!</div>

        </div>
            <button type="submit" class="btn btn-primary mt-3 float-end">Update</button>
        </form>
    </div>
</div>