<nav class="navbar navbar-expand-lg bg-success border-bottom">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('index')}}"><img src="{{ asset('assets/schoollogo.png') }}" alt="" style="width: 70px;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link text-light" style="letter-spacing: 1px" aria-current="page" href="{{route('index')}}"><i class="bi bi-house-fill"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" style="letter-spacing: 1px" href="{{route('schedule')}}"><i class="bi bi-calendar-date-fill"></i> Schedule</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" style="letter-spacing: 1px" href="{{route('dietary')}}"><i class="bi bi-egg-fill"></i> Dietary</a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light " style="letter-spacing: 1px" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Account
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('profile')}}"><i class="bi bi-info-circle-fill"></i> Edit Your Information</a></li>
              {{-- <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#childAddModal"><i class="bi bi-info-circle-fill"></i> Add Child Information</a></li> --}}
              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#childInfoModal"><i class="bi bi-info-circle-fill"></i> Edit Your Child's Information</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <button class="dropdown-item text-danger float-end mt-2" data-bs-toggle="modal" data-bs-target="#logoutModal">
                  <i class="bi bi-box-arrow-right"></i> Logout
                </button>
              </li>
            </ul>
          </li>
          
        </ul>
        <div class="nav-item float-end d-flex align-items-center">
            <p class="me-2 text-light" style="letter-spacing: 1px">
              {{ Auth::user()->first_name ?? Auth::user()->google_name }} 
              <a href="" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <i class="bi bi-bell-fill" style="font-size: 20px; color: rgb(255, 255, 255);"></i>
              </a>
            </p>
    </div>
  </nav>