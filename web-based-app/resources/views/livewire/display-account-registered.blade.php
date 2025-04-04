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
    @include('components.modal.parent.create-users')
   
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

                        @include('components.modal.parent.update-users')


                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update{{$account->id}}">
                            <i class="bi bi-pencil"></i> Update
                        </button>
                        @include('components.modal.parent.confirm-delete-users')
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete{{$account->id}}">
                            <i class="bi bi-trash"></i> Delete
                        </button>

                    </div>
                    
                       </td>
                
                </tr>
             @endforeach
            </tbody>
        </table>
            {{ $accounts->links() }}    
    </div>
</div>
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const password = document.getElementById('password');
        const passwordIcon = document.getElementById('togglePasswordIcon');
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        passwordIcon.classList.toggle('bi-eye');
        passwordIcon.classList.toggle('bi-eye-slash');
    });

    document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
        const confirmPassword = document.getElementById('password_confirmation');
        const confirmPasswordIcon = document.getElementById('toggleConfirmPasswordIcon');
        const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPassword.setAttribute('type', type);
        confirmPasswordIcon.classList.toggle('bi-eye');
        confirmPasswordIcon.classList.toggle('bi-eye-slash');
    });

    document.getElementById('password_confirmation').addEventListener('input', function () {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password_confirmation').value;
        const message = document.getElementById('passwordMatchMessage');
        if (password === confirmPassword) {
            message.textContent = 'Passwords match';
            message.style.color = 'green';
        } else {
            message.textContent = 'Passwords do not match';
            message.style.color = 'red';
        }
    });
</script>