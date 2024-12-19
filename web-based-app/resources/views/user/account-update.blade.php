<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

    
    @include('components.confirm-delete')
    @include('components.view-child-info-modal')
    @livewire('update-info')
    @livewire('add-child')

    <!-- Logout Confirmation Modal -->
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
                    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
    
    
 
    @include('components.navbar')
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Notifications</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div class="list-group">
            
            @livewire('display-reminder')

          </div>
        </div>
    </div>
    
    <div class="container">
        <div class="container justify-content-center">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2 col-md-12 " role="alert"  >
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger  alert-dismissible fade show mt-2 col-md-12" role="alert"  >
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
       </div>
        <div class="row justify-content-start">
            <div class="col-md-6 p-5 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Account</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('account.update', Auth::user()->id) }}" method="POST">
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
            </div>
        </div>
    </div>
    <script>
        document.getElementById('toggle-password').addEventListener('click', function () {
            var passwordInput = document.getElementById('password');
            var icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('bi-eye-slash-fill');
                icon.classList.add('bi-eye-fill');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('bi-eye-fill');
                icon.classList.add('bi-eye-slash-fill');
            }
        });
        document.getElementById('toggle-password-confirm').addEventListener('click', function () {
            var passwordInput = document.getElementById('password_confirmation');
            var icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('bi-eye-slash-fill');
                icon.classList.add('bi-eye-fill');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('bi-eye-fill');
                icon.classList.add('bi-eye-slash-fill');
            }
        });
    </script>
    <script>
        function checkPasswordMatch() {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("password_confirmation").value;
            const errorDisplay = document.getElementById("password_error");
            const submitBtn = document.getElementById("submitBtn");

            if (password !== confirmPassword) {
                errorDisplay.style.display = "block";
                submitBtn.disabled = true; // Disable the submit button if passwords don't match
            } else {
                errorDisplay.style.display = "none";
                submitBtn.disabled = false; // Enable the submit button if passwords match
            }
        }

        function validateForm() {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("password_confirmation").value;

            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false; // Prevent form submission if passwords do not match
            }
            return true; // Allow form submission if passwords match
        }

        // Attach the checkPasswordMatch function to input events for real-time feedback
        document.getElementById("password").addEventListener("input", checkPasswordMatch);
        document.getElementById("password_confirmation").addEventListener("input", checkPasswordMatch);

    </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   
     @livewireScripts
</body>
</html>