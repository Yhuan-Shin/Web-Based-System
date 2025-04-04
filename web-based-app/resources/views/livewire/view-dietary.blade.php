<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="container py-4">
        <h6 class="text-center mb-4">Dietary Plans and Activities</h6>
        <div class="row">
            @forelse($dietaries as $dietary)
                <div class="col-md-4">
                    <div class="card shadow-sm mt-3">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">{{ $dietary->student->st_first_name }} {{ $dietary->student->st_last_name }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Dietary:</strong> {{ $dietary->dietary }}</p>
                            <p class="card-text"><strong>Activities:</strong> {{ $dietary->activities }}</p>
                            <span class="badge bg-info">{{ $dietary->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info mt-3 text-center">
                        No dietary plans or activities found for this student.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
