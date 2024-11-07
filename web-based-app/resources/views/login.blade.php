<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body style="height: 100vh; background-image: url({{ asset('assets/bg.png') }}); background-size: cover;">

    <img src="{{ asset('assets/logo.jpg') }}" alt="" style="width: 150px; float: left; padding: 10px;">

    <div class="container">
        <div class="d-flex justify-content-center">
            <img src="{{ asset('assets/schoollogo.png') }}" alt="" style="width: 200px;">
        </div>

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
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card " style="background-color: rgb(62,87,95); transition: transform 0.2s;">
                    <div class="card-header text-center text-white">
                        <h4>Feeding Program Portal</h4>
                        <h6>Login</h6>
                    </div>
                    <div class="card-body text-white">
                        <form method="POST" action="{{ route('login') }}">
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
                            </div>
                            Don't have an account yet? <a href="{{ route('register') }}">Sign up</a>
                            <br>
                            <button type="submit" class="btn btn-primary float-right">Login</button>
                        </form>
                    </div>
                </div>
                <div class="social-media-icons text-center mt-3 px-3">
                    <p class="text-white">Click the icons below to login using:</p>
                    <a href="" target="_blank" class="button btn btn-light mb-2" >
                        <img src="{{ asset('assets/facebook_logo.png') }}" alt="">
                        Sign in with Facebook
                    </a>
                    <a href="{{ route('google.login') }}" target="_blank" class="button btn btn-light mb-2">
                        <img src="{{ asset('assets/google_logo.png') }}" alt="">
                        Sign in with Google
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
