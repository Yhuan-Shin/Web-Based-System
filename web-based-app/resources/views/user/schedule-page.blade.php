<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <!-- FullCalendar CSS -->
 <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/main.min.css' rel='stylesheet' />
    <title>Schedule</title>
    @livewireStyles
</head>
<body>
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
        @livewire('schedule')
    </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      
      @include('components.footer')

     <!-- FullCalendar JS -->
     <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/main.min.js'></script>
     <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.10/main.min.js'></script>
     <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.10/main.min.js'></script>
     <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.10/main.min.js'></script>
     @livewireScripts
</body>
</html>