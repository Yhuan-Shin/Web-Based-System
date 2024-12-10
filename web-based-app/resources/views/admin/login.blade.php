<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login Admin</title>
</head>
<body style="height: 100vh; background-image: url({{ asset('assets/bg.png') }}); background-size: cover;">
    <img src="{{ asset('assets/logo_.jpg') }}" alt="" style="width: 150px; float: left; padding: 10px;">

    <div class="container">
        <div class="d-flex justify-content-center">
            <img src="{{ asset('assets/school_logo.png') }}" alt="" style="width: 200px;">
        </div>
        @if (session('error'))
            <div class="alert alert-danger  alert-dismissible fade show mt-2" role="alert"  >
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row justify-content-center align-items-center ">
            <div class="col-md-6">
                <div class="card " style="background-color: rgb(62,87,95); transition: transform 0.2s;">
                    <div class="card-header text-center text-white">
                        <h4>Feeding Program Portal</h4>
                        <h6>Login Admin</h6>
                    </div>
                    <div class="card-body text-white">
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf
                            @method('POST')
                            <label for="email">Email address</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="email" class="form-control" aria-describedby="basic-addon1" id="email" name="email" required>
                            </div>

                            <label for="password">Password</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
                                <input type="password" class="form-control" id="password" name="password" aria-describedby="basic-addon1" required>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="toggle-password" style="cursor: pointer;"><i class="bi bi-eye-slash-fill"></i></span>
                                </div>
                            </div>
                            
                            <br>
                            <button type="submit" class="btn btn-primary float-right">Login</button>
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
    </script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
