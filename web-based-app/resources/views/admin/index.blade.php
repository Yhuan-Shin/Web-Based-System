<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('/style.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('script.js') }}"></script>
    @if(auth()->user()->role == 'admin')
        <title>Admin Dashboard</title>
    @else
        <title>Teacher Dashboard</title>
    @endif
    

    @livewireStyles
</head>
<body>
    <div class="wrapper">
        @include('components.admin.navbar')
        <div class="main">
            @include('components.admin.header')
            <div>
                
                @include('components.admin.confirm-logout')
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
                
                   <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="container">
                                    <div id="chartData" 
                                        data-labels='@json($data["labels"])' 
                                        data-counts='@json($data["counts"])'>
                                    </div>

                                    <form action="{{ route('admin.index') }}" method="GET" class="form-control">

                                        <div class="row">
                                            <div class="col">
                                                <label for="year" class="form-label">Select a year:</label>
                                                <select name="year" id="year" class="form-select" onchange="this.form.submit()">
                                                    @for ($y = date('Y') - 12; $y <= date('Y'); $y++) <!-- Shows last 5 years -->
                                                        <option value="{{ $y }}" {{ (int) request('year', date('Y')) == $y ? 'selected' : '' }}>
                                                            {{ $y }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="month" class="form-label ">Select a month:</label>
                                                <select name="month" id="month" class="form-select" onchange="this.form.submit()">
                                                    @for ($i = 1; $i <= 12; $i++)
                                                        <option value="{{ $i }}" {{ (int) request('month', date('n')) == $i ? 'selected' : '' }}>
                                                            {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="section" class="form-label">Select section:</label>
                                                <select name="section" id="section" class="form-select" onchange="this.form.submit()">
                                                    <option value="all" {{ request('section', 'all') == 'all' ? 'selected' : '' }}>All Sections</option>
                                                    <option value="Section A" {{ request('section') == 'Section A' ? 'selected' : '' }}>Section A</option>
                                                    <option value="Section B" {{ request('section') == 'Section B' ? 'selected' : '' }}>Section B</option>
                                                    <option value="Section C" {{ request('section') == 'Section C' ? 'selected' : '' }}>Section C</option>
                                                    <option value="Section D" {{ request('section') == 'Section D' ? 'selected' : '' }}>Section D</option>
                                                    <option value="Section E" {{ request('section') == 'Section E' ? 'selected' : '' }}>Section E</option>
                                                    <option value="Section F" {{ request('section') == 'Section F' ? 'selected' : '' }}>Section F</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="grade" class="form-label">Select grade:</label>
                                                <select name="grade" id="grade" class="form-select" onchange="this.form.submit()">
                                                    <option value="all" {{ request('grade', 'all') == 'all' ? 'selected' : '' }}>All Grades</option>
                                                    <option value="Kinder" {{ request('grade') == 'Kinder' ? 'selected' : '' }}>Kinder</option>
                                                    <option value="Grade 1" {{ request('grade') == 'Grade 1' ? 'selected' : '' }}>Grade 1</option>
                                                    <option value="Grade 2" {{ request('grade') == 'Grade 2' ? 'selected' : '' }}>Grade 2</option>
                                                    <option value="Grade 3" {{ request('grade') == 'Grade 3' ? 'selected' : '' }}>Grade 3</option>
                                                    <option value="Grade 4" {{ request('grade') == 'Grade 4' ? 'selected' : '' }}>Grade 4</option>
                                                    <option value="Grade 5" {{ request('grade') == 'Grade 5' ? 'selected' : '' }}>Grade 5</option>
                                                    <option value="Grade 6" {{ request('grade') == 'Grade 6' ? 'selected' : '' }}>Grade 6</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                

                                <div class="mt-4">
                                    <canvas id="healthChart"></canvas>
                                </div>
                            </div>
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
@livewireScripts

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</body>
</html>