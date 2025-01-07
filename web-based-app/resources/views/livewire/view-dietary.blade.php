<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @forelse($dietaries as $dietary)
                    <div class="card mt-3">
                        <div class="card-header">
                            <img src="{{ asset('storage/'.$dietary->image) }}" class="card-img-top" alt="..." style="height: 200px; width: 50%;">

                            <h5 class="card-title">{{ $dietary->student->st_first_name }} {{ $dietary->student->st_last_name }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $dietary->dietary }}</p>
                            <p class="card-text">{{ $dietary->activities }}</p>

                        </div>
                    </div>
                @empty
                    <div class="alert alert-info mt-3">
                        No dietary plans or activities found for this student.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
