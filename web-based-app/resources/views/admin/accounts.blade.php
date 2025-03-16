<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('/style.css') }}" />
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
                        @livewire('display-account-registered') 
                    </div>
                    
                </div>
                
            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    


    @livewireScripts
</body>
</html>