<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @livewireStyles
</head>
<body>
    
    <div class="wrapper">
        @include('components.admin.navbar')
        <div class="main">
           
            @include('components.admin.header')
            <div class="container">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                <div class="row">
                    <div class="col">
                        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to logout?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <a href="{{ route('admin.logout') }}" class="btn btn-danger">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @livewire('display-account-registered')  --}}
                        <h6>Account Creation</h6>
                    </div>
                    
                </div>
                <div class="row mt-3 justify-content-center">
                    <div class="col-md-6 border-rounded p-2">
                        <p>Add a User</p>
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
                                    <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                                    <option value="parent" {{ old('role') == 'parent' ? 'selected' : '' }}>Parent</option>
                                </select>
                                @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
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
    </div>
   
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

            ::after,
            ::before {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            a {
                text-decoration: none;
            }

            li {
                list-style: none;
            }

            /* h1 {
                font-weight: 100;
                font-size: 12;
            } */

            body {
                font-family: 'Poppins', sans-serif;
            }

            .wrapper {
                display: flex;
            }

            .main {
                min-height: 100vh;
                width: 100%;
                overflow: hidden;
                transition: all 0.35s ease-in-out;
                background-color: #fafbfe;
            }

            #sidebar {
                width: 70px;
                min-width: 70px;
                z-index: 1000;
                transition: all .25s ease-in-out;
                background-color: #0d4616;
                display: flex;
                flex-direction: column;
            }

            #sidebar.expand {
                width: 260px;
                min-width: 260px;
            }

            .toggle-btn {
                background-color: transparent;
                cursor: pointer;
                border: 0;
                padding: 1rem 1.5rem;
            }

            .toggle-btn i {
                font-size: 1.5rem;
                color: #FFF;
            }

            .sidebar-logo {
                margin: auto 0;
            }

            .sidebar-logo a {
                color: #FFF;
                font-size: 1.15rem;
                font-weight: 600;
            }

            #sidebar:not(.expand) .sidebar-logo,
            #sidebar:not(.expand) a.sidebar-link span {
                display: none;
            }

            .sidebar-nav {
                padding: 2rem 0;
                flex: 1 1 auto;
            }

            a.sidebar-link {
                padding: .625rem 1.625rem;
                color: #FFF;
                display: block;
                font-size: 0.9rem;
                white-space: nowrap;
                border-left: 3px solid transparent;
            }

            .sidebar-link i {
                font-size: 1.1rem;
                margin-right: .75rem;
            }

            a.sidebar-link:hover {
                background-color: rgba(255, 255, 255, .075);
                border-left: 3px solid #3b7ddd;
            }

            .sidebar-item {
                position: relative;
            }

            #sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
                position: absolute;
                top: 0;
                left: 70px;
                background-color: #0e2238;
                padding: 0;
                min-width: 15rem;
                display: none;
            }

            #sidebar:not(.expand) .sidebar-item:hover .has-dropdown+.sidebar-dropdown {
                display: block;
                max-height: 15em;
                width: 100%;
                opacity: 1;
            }

            #sidebar.expand .sidebar-link[data-bs-toggle="collapse"]::after {
                border: solid;
                border-width: 0 .075rem .075rem 0;
                content: "";
                display: inline-block;
                padding: 2px;
                position: absolute;
                right: 1.5rem;
                top: 1.4rem;
                transform: rotate(-135deg);
                transition: all .2s ease-out;
            }

            #sidebar.expand .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
                transform: rotate(45deg);
                transition: all .2s ease-out;
            }
                </style>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
                <style>
                    .card:hover {
                    transform: scale(1.05);
                    cursor: pointer;
                }
                .list-group-item {
                transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for effects */
            }

            .list-group-item:hover {
                background-color: #f8f9fa; /* Change background on hover */
                color: #007bff; /* Change text color on hover */
                cursor: pointer; /* Change cursor to pointer */
                transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for effects */
            }

            .list-group-item i {
                transition: color 0.3s ease; /* Smooth transition for icon color */
            }

            .list-group-item:hover i {
                color: #007bff; /* Change icon color on hover */
                transition: color 0.3s ease; /* Smooth transition for icon color */
            }
    </style>
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
    <script>
        const hamBurger = document.querySelector(".toggle-btn");

        hamBurger.addEventListener("click", function () {
        document.querySelector("#sidebar").classList.toggle("expand");
        });
    </script>
      <script>
        document.getElementById('role').addEventListener('change', function () {
            const relation = document.getElementById('relation');
            const role = document.getElementById('role');
            if (this.value === 'parent') {
                relation.disabled = false;
                relation.value = 'Parent/Guardian';
            } else if(this.value === 'teacher') {
                relation.disabled = true;
                relation.value = '';
            } 
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    @livewireScripts
</body>
</html>