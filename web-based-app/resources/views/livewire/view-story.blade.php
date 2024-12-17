<div>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="row scrolling-wrapper" >
            @foreach($story as $story)
                <div class="col-md col-sm-8">
                    <div class="card" width="width: 15rem;">
                        <img src="{{ asset('storage/'.$story->image) }}" class="card-img-top" alt="..." style="height: 200px; object-fit: cover; width: 100%;">
                        {{-- for deployment --}}
                        {{-- <img src="{{ asset('/'.$story->image) }}" class="card-img-top" alt="..." style="height: 200px; object-fit: cover; width: 100%;"> --}}

                        <div class="card-body">
                            <p class="card-text " style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis">{{ $story->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <style>
        .scrolling-wrapper {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            margin: auto
            -webkit-overflow-scrolling: touch;
            scroll-behavior: smooth;
            width: 700px;
        }

        .scrolling-wrapper .card {
            flex: 0 0 auto;
        }
    </style>
</div>