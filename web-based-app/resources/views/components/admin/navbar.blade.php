
<aside id="sidebar">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <i class="bi bi-list"></i>
        </button>
        <div class="sidebar-logo">
            <a href="#">Name of School</a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="{{ route('admin.index') }}" class="sidebar-link">
                <i class="bi bi-speedometer"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('planner.table') }}" class="sidebar-link">
                <i class="bi bi-calendar-date-fill"></i>
                <span>Planner</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('reminder.index') }}" class="sidebar-link" aria-controls="auth">
                <i class="bi bi-alarm-fill"></i>
                <span>Reminders</span>
            </a>
           
        </li>
       
        <li class="sidebar-item">
            <a href="#" class="sidebar-link">
                <i class="bi bi-person-badge-fill"></i>
                <span>Accounts</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link">
                <i class="bi bi-gear-fill"></i>
                <span>Setting</span>
            </a>
        </li>
    </ul>
    <div class="sidebar-footer">
        <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal" class="sidebar-link">
            <i class="bi bi-arrow-right-circle-fill"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>