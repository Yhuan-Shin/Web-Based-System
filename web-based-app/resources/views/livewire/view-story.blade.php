<div class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($story as $index => $stories)
                        <button 
                        type="button" 
                        data-bs-target="#carouselExampleIndicators" 
                        data-bs-slide-to="{{ $index }}" 
                        class="{{ $index == 0 ? 'active text-dark' : 'text-dark' }}" 
                        aria-current="{{ $index == 0 ? 'true' : 'false' }}" 
                        aria-label="Slide {{ $index + 1 }}">
                      </button>
                      
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @forelse ($story as $index => $stories)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $stories->image) }}" class="d-block w-50 m-auto" alt="">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $stories->description }}</h5>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                <strong>Sorry!</strong> No story found.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endforelse
                    </div>
                    @if ($story->isNotEmpty())
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
