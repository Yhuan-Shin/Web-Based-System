<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/main.min.css' rel='stylesheet' />
    <title>Home</title>
   
    @livewireStyles
</head>
<body>

  
        @include('components.confirm-delete')
        @include('components.view-child-info-modal')
        @livewire('update-info')
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
            <div class="col-md-12 mb-3">
                <div class="text-center">
                    <h2 class="mb-3">Welcome, {{ Auth::user()->first_name ?? Auth::user()->google_name }} </h2>
                    <p class="text-muted">To calculate Body Mass Index (BMI), follow the procedure recommended by the World Health Organization (WHO):</p>
                    
                           

                            
                    <div class="container">
                        <div class="row">
                            <div class="col-md">
                                <div class="table-responsive">
                                    <table class="table table-bordered caption-top">
                                        <caption>BMI Categories for Male</caption>
                                        <thead>
                                            <tr style="white-space: nowrap;">
                                                <th scope="col">Age (Years)</th>
                                                <th scope="col">Severely Wasted</th>
                                                <th scope="col">Underweight</th>
                                                <th scope="col">Normal</th>
                                                <th scope="col">Overweight</th>
                                                <th scope="col">Obese</th>
                                            </tr>
                                        </thead>
                                        <tbody style="white-space: nowrap;">
                                            <tr>
                                                <td>5</td>
                                                <td>&lt;13.0</td>
                                                <td>&lt;13.5</td>
                                                <td>13.8-17.0</td>
                                                <td>17.1-18.8</td>
                                                <td>&ge;18.9</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>&lt;13.5</td>
                                                <td>13.8</td>
                                                <td>14.0-17.5</td>
                                                <td>17.6-19.6</td>
                                                <td>&ge;19.7</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>&lt;13.8</td>
                                                <td>14.3</td>
                                                <td>14.6-18.2</td>
                                                <td>18.3-20.4</td>
                                                <td>&ge;20.5</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>&lt;14.0</td>
                                                <td>14.5</td>
                                                <td>14.6-19.0</td>
                                                <td>19.1-21.5</td>
                                                <td>&ge;21.6</td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>&lt;14.5</td>
                                                <td>14.9</td>
                                                <td>15.4-19.8</td>
                                                <td>19.9-22.6</td>
                                                <td>&ge;22.7</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>&lt;14.8</td>
                                                <td>15.3</td>
                                                <td>15.4-20.7</td>
                                                <td>20.8-23.8</td>
                                                <td>&ge;23.9</td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>&lt;15.3</td>
                                                <td>15.7</td>
                                                <td>15.8-21.7</td>
                                                <td>21.8-25.0</td>
                                                <td>&ge;25.1</td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>&lt;15.7</td>
                                                <td>16.2</td>
                                                <td>16.3-22.7</td>
                                                <td>22.8-26.5</td>
                                                <td>&ge;26.6</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="card mt-5">
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
                                        <div class="d-flex justify-content-center mt-3">
                                            <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#bmiModal">BMI Calculator</button>
                                          
                                        </div>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="table-responsive">
                                    <table class="table table-bordered caption-top">
                                        <caption>BMI Categories for Female</caption>
                                        <thead>
        
                                            <tr style="white-space: nowrap;">
                                                <th scope="col">Age (Years)</th>
                                                <th scope="col">Severely Wasted</th>
                                                <th scope="col">Underweight</th>
                                                <th scope="col">Normal</th>
                                                <th scope="col">Overweight</th>
                                                <th scope="col">Obese</th>
                                            </tr>
                                        </thead>
                                        <tbody style="white-space: nowrap;">
                                            <tr>
                                                <td>5</td>
                                                <td>&lt;13.0</td>
                                                <td>13.4</td>
                                                <td>13.6-17.0</td>
                                                <td>17.1-18.8</td>
                                                <td>&ge;18.9</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>&lt;13.4</td>
                                                <td>13.6</td>
                                                <td>13.9-17.4</td>
                                                <td>17.5-19.6</td>
                                                <td>&ge;19.7</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>&lt;13.6</td>
                                                <td>14.0</td>
                                                <td>14.3-18.1</td>
                                                <td>18.2-20.4</td>
                                                <td>&ge;20.5</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>&lt;14.0</td>
                                                <td>14.5</td>
                                                <td>14.7-19.0</td>
                                                <td>19.1-21.4</td>
                                                <td>&ge;21.5</td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>&lt;14.4</td>
                                                <td>15.0</td>
                                                <td>15.2-20.0</td>
                                                <td>20.1-22.6</td>
                                                <td>&ge;22.7</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>&lt;14.7</td>
                                                <td>15.2</td>
                                                <td>15.7-21.1</td>
                                                <td>21.2-24.0</td>
                                                <td>&ge;24.1</td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>&lt;15.3</td>
                                                <td>15.7</td>
                                                <td>16.2-22.3</td>
                                                <td>22.4-25.5</td>
                                                <td>&ge;25.6</td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>&lt;15.7</td>
                                                <td>16.2</td>
                                                <td>16.8-23.5</td>
                                                <td>23.6-27.0</td>
                                                <td>&ge;27.1</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    
                </div>
               
            </div>
            
        </div>
    </div>
    @include('components.footer')

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      
     @livewireScripts
</body>
</html>