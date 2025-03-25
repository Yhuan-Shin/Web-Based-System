<div>
  @if($story->count() > 0)
    <div class="container mt-5 d-flex justify-content-center">
        <button class="btn btn-outline-primary d-none d-md-block m-auto" id="scroll-left" style="margin-right: 10px; height:50px">&#8592;</button>
        <div class="row scrolling-wrapper">
            @foreach($story as $story)
            <div class="col-md col-sm-8">
                <div class="card" style="width: 15rem; margin-right: 10px;">
                <img src="{{ asset('/'.$story->image) }}" class="card-img-top" alt="..." style="height: 200px; object-fit: cover; width: 100%;">
                   {{-- for deployment --}}
                {{-- <img src="{{ asset('/'.$story->image) }}" class="card-img-top" alt="..." style="height: 200px; object-fit: cover; width: 100%;"> --}}

                <div class="card-body">
                    <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis">{{ $story->description }}</p>
                </div>
                </div>
            </div>
            @endforeach
        </div>
        <button class="btn btn-outline-primary d-none d-md-block m-auto" id="scroll-right" style="margin-left: 10px; height:50px">&#8594;</button>
    </div>
    @endif

    <script>
        document.getElementById('scroll-left').onclick = function() {
            document.querySelector('.scrolling-wrapper').scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        };

        document.getElementById('scroll-right').onclick = function() {
            document.querySelector('.scrolling-wrapper').scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        };
    </script>
    <style>
        .scrolling-wrapper {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            cursor: grab;
            scroll-behavior: smooth;
            width: 80%;
            padding: 15px;
        }

        .scrolling-wrapper .card {
            flex: 0 0 auto;
        }

        .scrolling-wrapper::-webkit-scrollbar {
            display: none; /* Hide scrollbar for WebKit browsers */
        }

        .scrolling-wrapper {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
</div>