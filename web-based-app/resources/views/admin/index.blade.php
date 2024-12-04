<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Dashboard Admin</title>
    @livewireStyles
</head>
<body>

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
    {{-- Users Modal --}}
   @livewire('display-users')
  
   {{-- post story modal --}}
   @livewire('post-story')
   
   @livewire('display-account-registered') 


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

     @include('components.admin.navbar')
    
    {{-- @livewire('view-story') --}}

    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <img src="{{ asset('assets/schoollogo.png') }}" alt="" style="width: 150px; margin: auto; padding: 10px;">
        </div>
        <div class="row mt-3">
            <div class="col-md mt-2">
                <div class="card shadow-sm bg-success m-auto" style=" transition: transform 0.2s;  height: 200px; width: 300px" data-bs-toggle="modal" data-bs-target="#usersModal">
                    <div class="card-body">
                        <h5 class="card-title text-light"><i class="bi bi-person-fill" style="font-size: 30px;
                        color: white;"></i> Students</h5>
                        <p class="text-light">Click here to view Students</p>
                        @livewire('count-users')

                    </div>
                </div>
            </div>
            
            <div class="col-md mt-2 ">
                <div class="card shadow-sm bg-success m-auto" style=" transition: transform 0.2s; height: 200px; width: 300px" 
                data-bs-toggle="modal" data-bs-target="#accountRegisteredModal">
                    <div class="card-body">
                        <h5 class="card-title text-light"><i class="bi bi-person-fill" style="font-size: 30px;
                        color: white;"></i> Accounts</h5>
                        <p class="text-light">Click here to view Accounts</p>
                        @livewire('account-registered')
                    </div>
                </div>
            </div>
            <div class="col-md mt-2 ">
                <div class="card shadow-sm bg-success m-auto" style=" transition: transform 0.2s; height: 200px;width: 300px">
                    <a  href="{{ route('planner.table') }}" class="text-decoration-none">
                        <div class="card-body">
                            <h5 class="card-title text-light"><i class="bi bi-calendar-date-fill" style="font-size: 30px;
                            color: white;"></i> Planner</h5>
                            <p class="text-light">Click here to view Planner</p> 
                        </div>
                    </a>
                    
                </div>
            </div>
            <div class="col-md mt-2 ">
                <div class="card shadow-sm bg-success m-auto" style=" transition: transform 0.2s;  height: 200px;width: 300px">
                    <a href="{{ route('reminder.index') }}" class="text-decoration-none">
                        <div class="card-body">
                            <h5 class="card-title text-light"><i class="bi bi-bell-fill" style="font-size: 30px;
                            color: white;"></i> Reminders</h5>
                            <p class="text-light">Click here to view Reminders</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
     
        
     
    </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      <style>
        .card:hover {
                    transform: scale(1.05);
                    cursor: pointer;
                }
                .list-group-item {
                transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for effects */
            }

            .list-group-item:hover {
                background-color: #f8f9fa; /* Change background on hover */
                color: #007bff; /* Change text color on hover */
                cursor: pointer; /* Change cursor to pointer */
                transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for effects */
            }

            .list-group-item i {
                transition: color 0.3s ease; /* Smooth transition for icon color */
            }

            .list-group-item:hover i {
                color: #007bff; /* Change icon color on hover */
                transition: color 0.3s ease; /* Smooth transition for icon color */
            }
    </style>
    @livewireScripts
</body>
</html>