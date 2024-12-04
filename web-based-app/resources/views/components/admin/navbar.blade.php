<div class="p-3">
    <button class="btn btn-success " style="float: left;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <i class="bi bi-list"> </i>
      </button>
 </div>
   
  <div class="offcanvas offcanvas-start bg-success" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        @if(Auth::check())
        <div class="container text-white">
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
    <div class="offcanvas-body bg-success">
        <hr>
      <div>
        
        <ul class="list-group list-group-flush ">
          <li class="list-group-item border-0 bg-success"><i class="bi bi-house-check-fill" style="font-size: 20px; color: white;"></i>
            <a href="{{route('admin.index')}}"  class="text-decoration-none text-light">Dashboard</a>
            </li>
            <li class="list-group-item border-0 bg-success"><i class="bi bi-person-fill" style="font-size: 20px; color: white;"></i>
            <a href="" data-bs-toggle="modal" data-bs-target="#usersModal" class="text-decoration-none text-light">Students</a>
            </li>

            <li class="list-group-item border-0 bg-success"><i class="bi bi-calendar-check-fill" style="font-size: 20px; color: white;"></i> <a href="{{route('planner.table')}}"class="text-decoration-none text-light">Planner</a></li>

          <li class="list-group-item border-0 bg-success"><i class="bi bi-bell-fill" style="font-size: 20px; color: white;"></i> 
            <a href="{{route('reminder.index')}}" class="text-decoration-none text-light"> Reminders</a>
        </li>

           

        </ul>
      </div>
     
    <!-- Logout Button -->
    <a href="#" class="btn btn-danger float-end mt-2" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>

    
    </div>
  </div>
