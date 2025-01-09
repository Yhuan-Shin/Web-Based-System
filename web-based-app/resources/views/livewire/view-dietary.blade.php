<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @forelse($dietaries as $dietary)
                    <div class="card mt-3">
                            @if($dietary->image)
                                <img src="{{ asset('storage/'.$dietary->image) }}" class="card-img-top m-auto" alt="..." style="height: 150px; width: 50%;  padding: 10px">
                            @else
                                <p class="badge bg-danger col-md-4 m-auto mt-2">No Image</p>
                            @endif

                            <p class="card-title">{{ $dietary->student->st_first_name }} {{ $dietary->student->st_last_name }}</p>
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
