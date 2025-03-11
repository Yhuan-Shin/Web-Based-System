<!-- Modal -->
<div class="modal fade" id="adminOnlyModal" tabindex="-1" aria-labelledby="adminOnlyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adminOnlyModalLabel">Admin Only</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                This section is for admin users only.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<aside id="sidebar">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <i class="bi bi-list"></i>
        </button>
        <div class="sidebar-logo">
            <img src="{{ asset('assets/school_logo.png') }}" alt="" style="width: 150px; margin: auto; padding: 10px;">
        </div>
    </div>
    <ul class="sidebar-nav ">
        <li class="sidebar-item">
            <a href="{{ route('admin.index') }}" class="sidebar-link">
                <i class="bi bi-speedometer"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('student.index') }}" class="sidebar-link">
                <i class="bi bi-person-fill"></i>        
                <span>Students</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('planner.table') }}" class="sidebar-link">
                <i class="bi bi-calendar-date-fill"></i>
                <span>Planner</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('stories.index') }}" class="sidebar-link" aria-controls="auth">
                <i class="bi bi-newspaper"></i>
                <span>Stories</span>
            </a>
           
        </li>
        <li class="sidebar-item">
            <a href="{{ route('reminder.index') }}" class="sidebar-link" aria-controls="auth">
                <i class="bi bi-alarm-fill"></i>
                <span>Reminders</span>
            </a>
           
        </li>
        <li class="sidebar-item">
            <a href="{{ route('dietary.index') }}" class="sidebar-link" aria-controls="auth">
                <i class="bi bi-egg-fill"></i>
                <span>Dietary & Activities</span>
            </a>
        </li>
        <li class="sidebar-item">
             
            @if(Auth::user()->role == 'teacher')
            <a href="#" class="sidebar-link" data-bs-toggle="modal" data-bs-target="#adminOnlyModal">
                <i class="bi bi-person-badge-fill"></i>
                <span>Accounts</span>
            </a>

           
            @else
            <a href="{{ route('account.index') }}" class="sidebar-link">
                <i class="bi bi-person-badge-fill"></i>
                <span>Accounts</span>
            </a>
            @endif
        </li>
        <li class="sidebar-item">
            <a href="/chat" class="sidebar-link"><i class="bi bi-chat-fill"></i>
                <span>Chat</span>
            </a>
        </li>
        {{-- <li class="sidebar-item">
            <a href="{{route('create.account.index')}}" class="sidebar-link">
                <i class="bi bi-gear-fill"></i>
                <span>Settings</span>
            </a>
        </li> --}}
    </ul>
    <div class="sidebar-footer">
        <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal" class="sidebar-link">
            <i class="bi bi-arrow-right-circle-fill"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>