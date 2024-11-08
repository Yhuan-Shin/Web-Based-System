<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Add Address and Phone</title>
</head>
<body style="height: 100vh; background-image: url({{ asset('assets/bg.png') }}); background-size: cover;">  
    <img src="{{ asset('assets/logo.jpg') }}" alt="" style="width: 150px; float: left; padding: 10px;">

    <div class="container">
        <div class="d-flex justify-content-center">
            <img src="{{ asset('assets/schoollogo.png') }}" alt="" style="width: 200px;">
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5 " style="background-color: rgb(62,87,95); transition: transform 0.2s;">
                    <div class="card-header text-center">
                        <h4 class="mb-0" style="color: white;">Add Address and Phone</h4>
                    </div>
                    <div class="card-body text-white">
                        <form action="{{ route('add.address.phone') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" maxlength="30" id="address" name="address" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)" required>
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Save</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>