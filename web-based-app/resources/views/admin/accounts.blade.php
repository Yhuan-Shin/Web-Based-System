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
         
                <div class="row">
                    <div class="col">
                       @include('components.admin.confirm-logout')
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
            const section = document.getElementById('section');
            if (this.value === 'parent') {
                relation.disabled = false;
                section.disabled = true;
                relation.value = 'Parent/Guardian';
            } else if(this.value === 'teacher') {
                relation.disabled = true;
                section.disabled = false;
                relation.value = '';
            } 
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    


    @livewireScripts
</body>
</html>