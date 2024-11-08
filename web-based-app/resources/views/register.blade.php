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
    <img src="{{ asset('assets/schoollogo.png') }}" alt=""  style="width: 300px; float: left; padding: 10px;">

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
                                            <label for="name">Name</label>
                                            <input type="text" maxlength="30" class="form-control" id="name" name="name" required>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" maxlength="30" class="form-control" id="address" name="address" required>
                                            @error('address')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text"  class="form-control" id="phone_number" name="phone_number" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                                            @error('phone_number')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="relation">Relation</label>
                                            <input type="text" maxlength="30" class="form-control" value="Parent/Guardian" disabled  id="relation" name="relation" required>
                                            @error('relation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email"  class="form-control" maxlength="30" id="email" name="email" required>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password"  maxlength="16" class="form-control" id="password" name="password" required oninput="checkPasswordMatch()">
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required oninput="checkPasswordMatch()">
                                            <div id="password_error" style="color: red; display: none;">Passwords do not match!</div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            Already have an account? <a href="/login">Login</a> <br>
                            <button type="submit" class="btn btn-primary float-right" id="submitBtn">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
