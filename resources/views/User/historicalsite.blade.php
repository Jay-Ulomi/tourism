<div class="untree_co-section">
    <div class="container">
        <div class="row text-center justify-content-center mb-5">
            <div class="col-lg-7">
                <h2 class="section-title text-center"> Historical Sites</h2>
            </div>
        </div>

        <div class="owl-carousel owl-3-slider">
            @foreach ($historicalSites as $historicalSite)
                <div class="item"  onclick="window.location='{{ route('history', ['id' => $historicalSite->id]) }}'" style="cursor:pointer;">
                    <a class="media-thumb" href="{{ asset('storage/' . $historicalSite->history_image) }}" data-fancybox="gallery">
                        <div class="media-text">
                            <h3>{{ $historicalSite->history_name }}</h3>
                            <span class="location">Zanzibar</span>
                        </div>

                        @if ($historicalSite->history_image)
                            <img src="{{ asset('storage/' . $historicalSite->history_image) }}" alt="Image" class=" img-size">
                        @else
                            No Image
                        @endif
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
