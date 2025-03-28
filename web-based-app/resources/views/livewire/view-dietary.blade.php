<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="container">
        <div class="row ">
                @forelse($dietaries as $dietary)
                <div class="col-md-4">

                    <div class="card mt-3">
                
                            <p class="card-title">{{ $dietary->student->st_first_name }} {{ $dietary->student->st_last_name }}</p>
                        <div class="card-body">
                            <p class="card-text"><strong>Dietary:</strong> {{ $dietary->dietary }}</p>
                            <p class="card-text"><strong>Activities:</strong> {{ $dietary->activities }}</p>
                            <span class="badge bg-info">{{ $dietary->created_at->diffForHumans() }}</span>

                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info mt-3">
                            No dietary plans or activities found for this student.
                        </div>
                    </div>
                @endforelse
        </div>
    </div>
</div>
