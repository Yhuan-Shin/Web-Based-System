<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <!-- FullCalendar CSS -->
 <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/main.min.css' rel='stylesheet' />
    <title>Home</title>
    @livewireStyles
</head>
<bodys>

  
        @include('components.confirm-delete')
        @include('components.update-child-info-modal')
        @include('components.view-child-info-modal')
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
    @livewire('b-m-i-calculator')
    @livewire('add-child')

    
 
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
    @livewire('view-story')
    <div class="container mt-5">
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
        <div class="row mt-3">
            <div class="col-md-6 mb-3">
                <div class="text-center">
                    <h2 class="mb-3">Welcome, {{ Auth::user()->name }}</h2>
                    <p class="text-muted">To calculate Body Mass Index (BMI), follow the procedure recommended by the World Health Organization (WHO):</p>
                    <div class="card mt-3">
                        <div class="card-body">
                            <ol class="text-start text-muted">
                                <li>Measure your weight in kilograms (kg).</li>
                                <li>Measure your height in meters (m).</li>
                                <li>Calculate your BMI using the formula: <strong>BMI = weight (kg) / (height (m) * height (m))</strong>.</li>
                                <li>Interpret your BMI using the following categories:
                                    <ul>
                                        <li>Underweight: BMI < 18.5</li>
                                        <li>Normal weight: BMI 18.5 - 24.9</li>
                                        <li>Overweight: BMI 25 - 29.9</li>
                                        <li>Obesity: BMI ≥ 30</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#bmiModal">BMI Calculator</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#childAddModal">Add Child Information</button>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('assets/bmi.jpg') }}" alt="" class="m-auto " style="width: 80%; ">
            </div>
        </div>
    </div>
    @include('components.footer')

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      
     @livewireScripts
</body>
</html>