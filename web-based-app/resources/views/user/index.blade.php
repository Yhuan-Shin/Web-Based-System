<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/main.min.css' rel='stylesheet' />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('script.js') }}"></script>

    <title>Home</title>
   
    @livewireStyles
</head>
<body>
  
  

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
    @include('components.view-child-info-modal')

   
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
    @livewire('view-story')
    
        <div class="row mt-3">
            <div class="col-md-6 mb-3">
                <div class="text-center">
                    <div class="col-md">
                        <div class="card mt-5">
                            <div class="card-body">
                                <ol class="text-start text-muted">
                                    <p class="text-muted">Make sure to add your information of your <span class="fw-bold text-decoration-underline text-primary"><a href="#" data-bs-toggle="modal" data-bs-target="#childAddModal">child</a></span> first.</p>

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
                                @livewire('bmi-calculator-test')
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#bmiModalTest">BMI Calculator</button>
                                  
                                </div>
                                    
                            </div>
                        </div>
                    </div>                          
                  
                   
                    
                </div>
               
            </div>
            <div class="col-md-6">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="container">
                                <div id="chartData" 
                                data-labels='@json($data["labels"])' 
                                data-counts='@json($data["counts"])'>
                            </div>
                                <form action="{{ route('index') }}" method="GET" class="form-control">
        
                                    <div class="row">
                                        <div class="col">
                                            <label for="year" class="form-label">Select a year:</label>
                                            <select name="year" id="year" class="form-select" onchange="this.form.submit()">
                                                @for ($y = date('Y') - 12; $y <= date('Y'); $y++) <!-- Shows last 5 years -->
                                                    <option value="{{ $y }}" {{ (int) request('year', date('Y')) == $y ? 'selected' : '' }}>
                                                        {{ $y }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="month" class="form-label ">Select a month:</label>
                                            <select name="month" id="month" class="form-select" onchange="this.form.submit()">
                                                @for ($i = 1; $i <= 12; $i++)
                                                    <option value="{{ $i }}" {{ (int) request('month', date('n')) == $i ? 'selected' : '' }}>
                                                        {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </form>
        
                            </div>
                               
        
                            <div class="mt-4">
                                <canvas id="healthChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    @livewire('update-info')

    @include('components.footer')

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      
     @livewireScripts
     
</body>
</html>