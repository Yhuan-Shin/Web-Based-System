<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Register</title>
</head>
<body style="height: 100vh; background-image: url({{ asset('assets/bg.png') }}); background-size: cover;">
    <img src="{{ asset('assets/logo_.jpg') }}" alt="" style="width: 150px; float: left; padding: 10px;">

    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger  alert-dismissible fade show mt-2" role="alert"  >
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success  alert-dismissible fade show mt-2" role="alert"  >
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>  
        @endif
        <div class="d-flex justify-content-center">
            <img src="{{ asset('assets/schoollogo.png') }}" alt="" style="width: 200px;">
        </div>
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-6">
                <div class="card " style="background-color: rgb(62,87,95); transition: transform 0.2s;">
                    <div class="card-header text-center text-white">
                        <h4>Feeding Program Portal</h4>
                        <h6>Register</h6>
                    </div>
                    <div class="card-body text-white">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            @method('POST') 
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" name="role" value="user">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" maxlength="30" class="form-control" placeholder="First Name" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                                            @error('first_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="middle_name">Middle Name</label>
                                            <input type="text" maxlength="30" class="form-control" placeholder="Middle Name" id="middle_name" name="middle_name" value="{{ old('middle_name') }}">
                                            @error('middle_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" maxlength="30" class="form-control" placeholder="Last Name" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                                            @error('last_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" maxlength="30" class="form-control" id="address" value="{{ old('address') }}" name="address" required>
                                            @error('address')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text" class="form-control" id="phone_number" placeholder="09xxxxxxxxx" value="{{ old('phone_number') }}" name="phone_number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)" required>
                                            @error('phone_number')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="relation">Relation</label>
                                            <select class="form-control" id="relation" name="relation" value="{{ old('relation') }}" required>
                                                <option value="">Select Relation</option>
                                                <option value="Parent">Parent</option>
                                                <option value="Guardian">Guardian</option>
                                            </select>
                                            @error('relation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email"  class="form-control" maxlength="30" placeholder="example@gmail.com" id="email" value="{{ old('email') }}" name="email" required>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" aria-describedby="basic-addon1" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="toggle-password" style="cursor: pointer;"><i class="bi bi-eye-slash-fill"></i></span>
                                                </div>
                                            </div>
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" aria-describedby="basic-addon1" required>

                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="toggle-password-confirm" style="cursor: pointer;"><i class="bi bi-eye-slash-fill"></i></span>
                                                </div>
                                            </div>
                                            @error('password_confirmation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <div id="password_error" style="color: red; display: none;">Passwords do not match!</div>

                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            Already have an account? <a href="/login">Login</a> <br>
                            <hr class="bg-light">
                            <p>Add Child</p>
                            @livewire('register-student')
                               
                            <button type="submit" class="btn btn-primary float-right" id="submitBtn">Sign Up</button>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
