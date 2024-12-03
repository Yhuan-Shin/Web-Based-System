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
<body style="height: 100vh; background-image: url({{ asset('assets/bg.png') }}); background-size: cover;">

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
   {{-- reminder modal --}}
   @livewire('create-reminder')
    {{-- planner modal --}}
   @livewire('create-planner')
   {{-- post story modal --}}
   @livewire('post-story')



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

     <div class="p-3">
        <button class="btn btn-primary " style="float: left;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="bi bi-list"> </i>
          </button>
     </div>
       
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            @if(Auth::check())
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h6 class="offcanvas-title m-auto" id="offcanvasExampleLabel">Welcome, {{ Auth::user()->name }}</h6> 
                        <p class="m-auto">
                           Admin
                        </p>
                    </div>
                    <div class="col">
                        <i class="bi bi-person-circle" style="font-size: 30px;"></i>

                    </div>
                </div>
            </div>
            @endif
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <hr>
          <div>
            
            <ul class="list-group list-group-flush">
                <li class="list-group-item border-0"><i class="bi bi-person-fill" style="font-size: 20px; color: gray;"></i>
                <a href="" data-bs-toggle="modal" data-bs-target="#usersModal" class="text-decoration-none text-dark">Students</a>
                </li>

                <li class="list-group-item border-0"><i class="bi bi-calendar-check-fill" style="font-size: 20px; color: orange;"></i> Planner</li>

              <li class="list-group-item border-0"><i class="bi bi-bell-fill" style="font-size: 20px; color: red;"></i> 
                <a href="" data-bs-toggle="modal" data-bs-target="#plannerModal" class="text-decoration-none text-dark"> Reminders</a>
            </li>

               <li class="list-group-item border-0"><i class="bi bi-image-fill" style="font-size: 20px; color: green;"></i> 
                <a href="" data-bs-toggle="modal" data-bs-target="#postStoryModal" class="text-decoration-none text-dark">Post Story</a></li>
                <li class="list-group-item border-0"><i class="bi bi-pie-chart-fill" style="font-size: 20px; color: blue;"></i> Weekly Report</li>
                <li class="list-group-item border-0" data-bs-toggle="modal" data-bs-target="#childInfoModal"><i class="bi bi-info-circle-fill" style="font-size: 20px; color: black;"></i> User Information</li>

            </ul>
          </div>
          {{-- <div class="dropdown mt-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
              Dropdown button
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div> --}}
        <!-- Logout Button -->
        <a href="#" class="btn btn-danger float-end mt-2" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>

        
        </div>
      </div>

    <div class="container">
        <div class="d-flex justify-content-center">
            <img src="{{ asset('assets/schoollogo.png') }}" alt="" style="width: 200px;">
        </div>
        <div class="row">
            <div class="col-md mt-2">
                <div class="card shadow-sm" style="background-color: rgb(111, 167, 185); transition: transform 0.2s;  height: 200px;" data-bs-toggle="modal" data-bs-target="#usersModal">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-person-fill" style="font-size: 30px;
                        color: gray;"></i> Students</h5>
                        <p>Click here to view Students</p>
                        @livewire('count-users')

                    </div>
                </div>

                
            </div>
            
            <div class="col-md mt-2">
                <div class="card shadow-sm" style="background-color: rgb(111, 167, 185); transition: transform 0.2s; height: 200px;" 
                >
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-calendar-fill" style="font-size: 30px;
                        color: orange;"></i> Planner</h5>
                        <p data-bs-toggle="modal" data-bs-target="#plannerModal" >Click here to create planner</p>
                        <span class="badge bg-primary rounded-pill float-end"><a href="{{ route('planner.table') }}" class="text-decoration-none text-white">View Table </a></span>
                    </div>
                </div>
            </div>
            <div class="col-md mt-2">
                <div class="card shadow-sm" style="background-color: rgb(111, 167, 185); transition: transform 0.2s; height: 200px;" >
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-bell-fill" style="font-size: 30px; color: red;"></i> Reminder</h5>
                        <p data-bs-target="#reminderModal" data-bs-toggle="modal">Click here to create reminder</p>
                        <span class="badge bg-primary rounded-pill float-end"><a href="{{ route('reminder.table') }}" class="text-decoration-none text-white">View Table </a></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <div class="card shadow-sm" style="background-color: rgb(111, 167, 185); transition: transform 0.2s; height: 200px;"
                data-bs-toggle="modal" data-bs-target="#postStoryModal">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-image-fill" style="font-size: 30px; color: green;"></i> Post Story</h5>
                        <p>Click here to post story</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm" style="background-color: rgb(111, 167, 185); transition: transform 0.2s; height: 200px;" >
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-pie-chart-fill" style="font-size: 30px; color: blue;"></i> Weekly Report</h5>
                        <p>Click here to view weekly report</p>
                    </div>
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