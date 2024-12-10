    <div class="container">
        <div class="d-flex justify-content-center">
        </div>
        <div class="row mt-3">
            <div class="col-md mt-2">
                <div class="card shadow-sm bg-success m-auto" style="transition: transform 0.2s; height: 200px; width: 300px">
                    <a href="{{ route('student.index')}}" class="text-decoration-none">
                        <div class="card-body">
                            <i class="bi bi-person-fill" style="font-size: 30px; color: white;"></i>
                            <h5 class="card-title text-light">Students</h5>
                            <p class="text-light" style="font-size: 12px">Click here to view Students</p>
                            @livewire('count-users')
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="col-md mt-2">
                <div class="card shadow-sm bg-success m-auto" style="transition: transform 0.2s; height: 200px; width: 300px">
                    <a href="{{ route('account.index') }}">
                        <div class="card-body">
                            <i class="bi bi-person-fill" style="font-size: 30px; color: white;"></i>
                            <h5 class="card-title text-light">Accounts</h5>
                            <p class="text-light" style="font-size: 12px">Click here to view Accounts</p>
                            @livewire('account-registered')
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="col-md mt-2">
                <div class="card shadow-sm bg-success m-auto" style="transition: transform 0.2s; height: 200px; width: 300px">
                    <a href="{{ route('planner.table') }}" class="text-decoration-none">
                        <div class="card-body">
                            <i class="bi bi-calendar-date-fill" style="font-size: 30px; color: white;"></i>
                            <h5 class="card-text text-light">Planner</h5>
                            <p class="text-light" style="font-size: 12px">Click here to view Planner</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="row mt-2">
            <div class="col-md mt-2">
                <div class="card shadow-sm bg-success m-auto" style="transition: transform 0.2s; height: 200px; width: 300px"> 
                        <a href="{{ route('stories.index') }}" class="text-decoration-none">
                            <div class="card-body">
                                <i class="bi bi-newspaper" style="font-size: 30px; color: white;"></i>
                                <h5 class="card-title text-light">Stories</h5>
                                <p class="text-light" style="font-size: 12px">Click here to view Reminders</p>
                            </div>
                    </a>
                </div>
            </div>
            
            <div class="col-md mt-2">
                <div class="card shadow-sm bg-success m-auto" style="transition: transform 0.2s; height: 200px; width: 300px">
                    <a href="{{ route('reminder.index') }}" class="text-decoration-none">
                        <div class="card-body">
                            <i class="bi bi-bell-fill" style="font-size: 30px; color: white;"></i>
                            <h5 class="card-title text-light">Reminders</h5>
                            <p class="text-light" style="font-size: 12px">Click here to view Reminders</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
