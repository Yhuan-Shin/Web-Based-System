<div wire:poll.3000ms>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <div class="modal fade" id="createAccountModal" wire:ignore tabindex="-1" aria-labelledby="createAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAccountModalLabel">Create Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('create.account')}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                            @error('first_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                            @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="middle_name" class="form-label">Middle name</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name') }}" required>
                            @error('middle_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="" disabled>Select Role</option>
                                <option value="teacher">Teacher</option>
                                <option value="parent">Parent/Guardian</option>
                            </select>
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="section" class="form-label">Section</label>
                            <select class="form-control" id="section" name="section" required>
                                <option value="" >Select Section</option>   
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
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone number</label>
                            <input type="text" class="form-control" id="phone_number" placeholder="09xxxxxxxxx" value="{{ old('phone_number') }}" name="phone_number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)" required>
                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="relation" class="form-label">Relation</label>
                            <input type="text" class="form-control" id="relation" disabled name="relation" placeholder="LEAVE BLANK IF THE ROLE IS TEACHER" value="{{ old('relation') }}" required>
                            @error('relation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required>
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
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                    <i class="bi bi-eye-slash" id="toggleConfirmPasswordIcon"></i>
                                </button>
                            </div>
                            <div id="passwordMatchMessage" class="mt-2"></div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 float-end">Create Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Search" wire:model="search">
            </div>
            <div class="col-md-2">
                <select class="form-select" wire:model="roleFilter">
                    <option value="">All</option>
                    <option value="teacher">Teacher</option>
                    <option value="parent">Parent</option>
                </select>
            </div>
            <div class="col">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createAccountModal">Add User</button>
            </div>
        </div>
    </div>
    <div class="table responsive table-hover text-center table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                   
                </tr>
            </thead>
            <tbody>
             @foreach($accounts as $account)
            
                <tr>
                        <td>
                            @if($account->last_name == null  && $account->first_name == null && $account->middle_name == null)
                                {{$account->google_name}}
                            @else
                                {{$account->last_name}}, {{$account->first_name}} {{$account->middle_name}}
                            @endif
                        </td>
                      
                       <td>{{$account->email}}</td>
                       <td>{{$account->address}}</td>
                       <td>{{$account->phone_number}}</td>  
                       <td>
                        @if($account->role == 'teacher')
                            <span class="badge bg-primary">Teacher</span>
                            <span class="badge bg-secondary">{{$account->section}}</span>
                        @elseif($account->role == 'parent')
                            <span class="badge bg-success">Parent/Guardian</span>
                        @endif
                       </td>
                       <td>
                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="confirmDelete{{$account->id}}" wire:ignore.self tabindex="-1" aria-labelledby="confirmDeleteLabel{{$account->id}}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteLabel{{$account->id}}">Confirm Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this account?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger" wire:click="delete({{$account->id}})" data-bs-dismiss="modal">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete{{$account->id}}">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                       </td>
                
                </tr>
             @endforeach
            </tbody>
        </table>
            {{ $accounts->links() }}    
    </div>
</div>
