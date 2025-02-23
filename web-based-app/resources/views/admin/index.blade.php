<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        var analytics = <?php echo $result; ?>

        google.charts.load("current", { packages: ["corechart"] });
        google.charts.setOnLoadCallback(drawChart);
    
        function drawChart() {
            var data = google.visualization.arrayToDataTable(analytics);
    
            var options = {
                title: 'BMI Results Distribution',
                is3D: true,
            };
    
            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
    <title>Dashboard Admin</title>
    @livewireStyles
</head>
<body>
    <div class="wrapper">
        @include('components.admin.navbar')
        <div class="main">
            @include('components.admin.header')
            <div class="text-center">
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

                   {{-- Main content --}}
                  
                   <div class="container justify-content-center">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-2 col-md-12 " role="alert"  >
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger  alert-dismissible fade show mt-2 col-md-12" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <div class="container d-flex justify-content-center">
                        <div id="piechart_3d" style="width: 500px; height: 300px;"></div>
                    </div>

                    @include('components.admin.cards')
                    
            </div>
        </div>
    </div>
       
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

            ::after,
            ::before {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            a {
                text-decoration: none;
            }

            li {
                list-style: none;
            }

            /* h1 {
                font-weight: 100;
                font-size: 12;
            } */

            body {
                font-family: 'Poppins', sans-serif;
            }

            .wrapper {
                display: flex;
            }

            .main {
                min-height: 100vh;
                width: 100%;
                overflow: hidden;
                transition: all 0.35s ease-in-out;
                background-color: #fafbfe;
            }

            #sidebar {
                width: 70px;
                min-width: 70px;
                z-index: 1000;
                transition: all .25s ease-in-out;
                background-color: #0d4616;
                display: flex;
                flex-direction: column;
            }

            #sidebar.expand {
                width: 260px;
                min-width: 260px;
            }

            .toggle-btn {
                background-color: transparent;
                cursor: pointer;
                border: 0;
                padding: 1rem 1.5rem;
            }

            .toggle-btn i {
                font-size: 1.5rem;
                color: #FFF;
            }

            .sidebar-logo {
                margin: auto 0;
            }

            .sidebar-logo a {
                color: #FFF;
                font-size: 1.15rem;
                font-weight: 600;
            }

            #sidebar:not(.expand) .sidebar-logo,
            #sidebar:not(.expand) a.sidebar-link span {
                display: none;
            }

            .sidebar-nav {
                padding: 2rem 0;
                flex: 1 1 auto;
            }

            a.sidebar-link {
                padding: .625rem 1.625rem;
                color: #FFF;
                display: block;
                font-size: 0.9rem;
                white-space: nowrap;
                border-left: 3px solid transparent;
            }

            .sidebar-link i {
                font-size: 1.1rem;
                margin-right: .75rem;
            }

            a.sidebar-link:hover {
                background-color: rgba(255, 255, 255, .075);
                border-left: 3px solid #3b7ddd;
            }

            .sidebar-item {
                position: relative;
            }

            #sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
                position: absolute;
                top: 0;
                left: 70px;
                background-color: #0e2238;
                padding: 0;
                min-width: 15rem;
                display: none;
            }

            #sidebar:not(.expand) .sidebar-item:hover .has-dropdown+.sidebar-dropdown {
                display: block;
                max-height: 15em;
                width: 100%;
                opacity: 1;
            }

            #sidebar.expand .sidebar-link[data-bs-toggle="collapse"]::after {
                border: solid;
                border-width: 0 .075rem .075rem 0;
                content: "";
                display: inline-block;
                padding: 2px;
                position: absolute;
                right: 1.5rem;
                top: 1.4rem;
                transform: rotate(-135deg);
                transition: all .2s ease-out;
            }

            #sidebar.expand .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
                transform: rotate(45deg);
                transition: all .2s ease-out;
            }
                </style>
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
    <script>
        const hamBurger = document.querySelector(".toggle-btn");

        hamBurger.addEventListener("click", function () {
        document.querySelector("#sidebar").classList.toggle("expand");
        });
    </script>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</body>
</html>