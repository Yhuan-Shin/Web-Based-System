{{-- Update --}}
<div class="modal fade" id="update{{$account->id}}" wire:ignore.self tabindex="-1" aria-labelledby="updateModalLabel{{$account->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel{{$account->id}}">Update Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.account', $account->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{$account->first_name }}" required>
                        @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{$account->last_name }}" required>
                        @error('last_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="middle_name" class="form-label">Middle name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ $account->middle_name }}" required>
                        @error('middle_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="{{$account->role}}" disabled selected>{{$account->role}}</option>
                            <option value="teacher">Teacher</option>
                            <option value="parent">Parent/Guardian</option>
                        </select>
                        @error('role')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="section" class="form-label">Section</label>
                        <select class="form-control" id="section" name="section" >
                            <option value="{{ $account->section }}" disabled selected>{{ $account->section ? $account->section: 'For Teachers Only'}}</option>   
                            <option value="Section A">Section A</option>
                            <option value="Section B">Section B</option>
                            <option value="Section C">Section C</option>
                            <option value="Section D">Section D</option>
                            <option value="Section E">Section E</option>
                            <option value="Section F">Section F</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $account->address }}" required>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone number</label>
                        <input type="text" class="form-control" id="phone_number" placeholder="09xxxxxxxxx" value="{{ $account->phone_number }}" name="phone_number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)" required>
                        @error('phone_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="relation" class="form-label">Relation</label>
                        <input type="text" class="form-control" id="relation" disabled name="relation" placeholder="LEAVE BLANK IF THE ROLE IS TEACHER" value="{{ $account->relation }}" required>
                        @error('relation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $account->email }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" >
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="bi bi-eye-slash" id="togglePasswordIcon"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                <i class="bi bi-eye-slash" id="toggleConfirmPasswordIcon"></i>
                            </button>
                        </div>
                        <div id="passwordMatchMessage" class="mt-2"></div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 float-end">Update Account</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>  
</div>
