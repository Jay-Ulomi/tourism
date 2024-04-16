<div class="untree_co-section">
    <div class="container">
        <div class="row text-center justify-content-center mb-5">
            <div class="col-lg-7">
                <h2 class="section-title text-center">Popular Destination</h2>
            </div>
        </div>

        <div class="owl-carousel owl-3-slider">
            @foreach ($destinations as $destination)
                <div class="item">
                    <a class="media-thumb" href="{{ asset('storage/' . $destination->destination_images) }}" data-fancybox="gallery">
                        <div class="media-text">
                            <h3>{{ $destination->destination_name }}</h3>
                            <span class="location">Zanzibar</span>
                        </div>

                        @if ($destination->destination_images)
                            <img src="{{ asset('storage/' . $destination->destination_images) }}" alt="Image" class=" img-size">
                        @else
                            No Image
                        @endif
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
