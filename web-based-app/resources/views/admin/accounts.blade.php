<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('/style.css') }}" />
    <title>Accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @livewireStyles
</head>
<body>
    
    <div class="wrapper">
        @include('components.admin.navbar')
        <div class="main">
           
            @include('components.admin.header')
            <div class="container">
         
                <div class="row">
                    <div class="col">
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
                        @livewire('display-account-registered') 
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
   
   
   
   

    <script>
        const hamBurger = document.querySelector(".toggle-btn");

        hamBurger.addEventListener("click", function () {
        document.querySelector("#sidebar").classList.toggle("expand");
        });
    </script>
      <script>
        document.getElementById('role').addEventListener('change', function () {
            const relation = document.getElementById('relation');
            const role = document.getElementById('role');
            const section = document.getElementById('section');
            if (this.value === 'parent') {
                relation.disabled = false;
                section.disabled = true;
                relation.value = 'Parent/Guardian';
            } else if(this.value === 'teacher') {
                relation.disabled = true;
                section.disabled = false;
                relation.value = '';
            } 
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    


    @livewireScripts
</body>
</html>