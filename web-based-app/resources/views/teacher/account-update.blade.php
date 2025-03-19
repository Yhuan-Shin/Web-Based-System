<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('/style.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('script.js') }}"></script>
    @if(auth()->user()->role == 'teacher')
        <title>Account Update</title>
    @endif
    

    @livewireStyles
</head>
<body>
    <div class="wrapper">
        @include('components.admin.navbar')
        <div class="main">
            @include('components.admin.header')
            <div>
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
                                <a href="{{ route('admin.logout') }}" class="btn btn-danger">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                   {{-- Main content --}}
                  
                   <div class="container justify-content-center">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-2 col-md-12 " role="alert"  >
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger  alert-dismissible fade show mt-2 col-md-12" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                @include('components.teacher.account-update')
                            </div>
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
<script>
    const hamBurger = document.querySelector(".toggle-btn");

    hamBurger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
    });
</script>
@livewireScripts

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</body>
</html>