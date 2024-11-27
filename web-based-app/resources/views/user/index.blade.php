<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <!-- FullCalendar CSS -->
 <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/main.min.css' rel='stylesheet' />
    <title>Dashboard</title>
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
       {{-- child's delete modal --}}
         @foreach ($students as $child)
         <!-- Child's Delete Modal -->
         <div class="modal fade" id="childDeleteModal{{ $child->id }}" tabindex="-1" aria-labelledby="childDeleteModalLabel{{ $child->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="childDeleteModalLabel{{ $child->id }}">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete {{ $child->name }}'s information?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form action="{{ route('student.destroy', $child->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
         <!-- Child's Update Modal -->
         @foreach ($students as $child)
         <div class="modal fade" id="childEditModal{{ $child->id }}" tabindex="-1" aria-labelledby="childInfoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="childInfoModalLabel">Update Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Child's Information content goes here -->
                        <form action="{{ route('student.update', $child->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $child->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" min="1" name="age" value="{{ $child->age }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="male" {{ $child->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $child->gender == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Update</button>
                        </form>

                    </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    <!-- Child's Add Modal -->
    <div class="modal fade" id="childAddModal" tabindex="-1" aria-labelledby="childAddModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="childAddModalLabel">Add Child's Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Child's Information content goes here -->
                    <form action="{{ route('student.submit') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="childName" class="form-label">Child's Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="childAge" class="form-label">Child's Age</label>
                            <input type="number" class="form-control" id="age" name="age" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="childGender" class="form-label">Child's Gender</label>
                            <select class="form-select" id="childGender" name="gender" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Child Info Modal -->
    <div class="modal fade" id="childInfoModal" tabindex="-1" aria-labelledby="childInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="childInfoModalLabel">Child's Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <!-- Child's Information content goes here -->
                    <div class="list-group">
                        @forelse ($students as $child)
                        <div class="list-group-item list-group-item-action border mb-2">
                            <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#childEditModal{{ $child->id }}">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ $child->name }}</h6>  
                                    <small>{{ $child->age }} years old </small>                                  
                                </div>
                            </a>
                                <p class="mb-1 text-muted">Gender: 
                                    @if($child->gender == 'male')
                                        <span class="badge bg-primary rounded-pill">Male</span>
                                    @elseif($child->gender == 'female')
                                        <span class="badge bg-danger rounded-pill">Female</span>
                                    @endif
                                    <i class="bi bi-trash-fill  float-end" style="color: red;" data-bs-toggle="modal" data-bs-target="#childDeleteModal{{ $child->id }}"></i>
                                
                                </p>
                       
                        </div>
                            

                           

                        @empty
                            <p>No child's information found.</p>
                        @endforelse
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#childAddModal">
                        <i class="bi bi-plus"></i>
                        Add
                    </button>
                </div>
            </div>
        </div>
    </div>
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
    @livewire('schedule')   
    @livewire('display-reminder')
    @livewire('view-story')



     <div class="p-3">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
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
                            @if(Auth::user()->role == 'user') 
                                Parent
                            @endif
                        </p>
                    </div>
                    <div class="col">
                        <i class="bi bi-person-circle" style="font-size: 30px;"></i>

                    </div>
                </div>
            </div>
            @endif
          <button type="button" class="btn-close"  style="float: left;" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <hr>
          <div>
            
            <ul class="list-group list-group-flush">
                <li class="list-group-item border-0"><i class="bi bi-calculator-fill" style="font-size: 20px; color: gray;"></i>
                    <a href="" data-bs-toggle="modal" data-bs-target="#bmiModal" class="text-decoration-none text-dark">BMI</a>
                </li>

                <li class="list-group-item border-0"><i class="bi bi-calendar-fill" style="font-size: 20px; color: orange;"></i> 
                    <a href="" data-bs-toggle="modal" data-bs-target="#scheduleModal" class="text-decoration-none text-dark">Schedule</li>

              <li class="list-group-item border-0"><i class="bi bi-bell-fill" style="font-size: 20px; color: red;"></i>
                <a href="" data-bs-toggle="modal" data-bs-target="#reminderModal" class="text-decoration-none text-dark">Reminders</a>
             </li>

               <li class="list-group-item border-0"><i class="bi bi-egg-fill" style="font-size: 20px; color: green;"></i> Dietary</li>
                <li class="list-group-item border-0"><i class="bi bi-image-fill" style="font-size: 20px; color: green;"></i> 
                <a href=""></a> View Story</li>
                <li class="list-group-item border-0" data-bs-toggle="modal" data-bs-target="#childInfoModal"><i class="bi bi-info-circle-fill" style="font-size: 20px; color: blue;"></i> Child's Information</li>

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
                <div class="card shadow-sm" style="background-color: rgb(111, 167, 185); transition: transform 0.2s;  height: 200px;" data-bs-toggle="modal" data-bs-target="#bmiModal">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-calculator-fill" style="font-size: 30px; color: gray;"></i> BMI</h5>
                        <p>Click here to calculate your BMI</p>
                    </div>
                </div>

                
            </div>
            
            <div class="col-md mt-2">
                <div class="card shadow-sm" style="background-color: rgb(111, 167, 185); transition: transform 0.2s; height: 200px;" data-bs-toggle="modal" data-bs-target="#scheduleModal" 
                data-bs-toggle="modal">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-calendar-fill" style="font-size: 30px; color: orange;"></i> Schedule</h5>
                        <p>Click here to view your schedule</p>
                    </div>
                </div>
            </div>
            <div class="col-md mt-2">
                <div class="card shadow-sm" style="background-color: rgb(111, 167, 185); transition: transform 0.2s; height: 200px;"
                data-bs-toggle="modal" data-bs-target="#reminderModal">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-bell-fill" style="font-size: 30px; color: red;"></i> Reminders</h5>
                        <p>Click here to view your reminders</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <div class="card shadow-sm" style="background-color: rgb(111, 167, 185); transition: transform 0.2s; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-egg-fill" style="font-size: 30px; color: green;"></i> Dietary</h5>
                        <p>Click here to view your dietary</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm" style="background-color: rgb(111, 167, 185); transition: transform 0.2s; height: 200px;"
                data-bs-toggle="modal" data-bs-target="#viewStoryModal">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="bi bi-image-fill" style="font-size: 30px; color: green;"></i> View Story
                        </h5>
                        <p>Click here to view story</p>
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
     <!-- FullCalendar JS -->
     <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/main.min.js'></script>
     <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.10/main.min.js'></script>
     <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.10/main.min.js'></script>
     <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.10/main.min.js'></script>
     @livewireScripts
</body>
</html>