<div class="untree_co-section">
    <div class="container">
        <div class="row text-center justify-content-center mb-5">
            <div class="col-lg-7">
                <h2 class="section-title text-center">Food</h2>
            </div>
        </div>

        <!-- Foods -->
        <div class="owl-carousel owl-3-slider">
            @foreach ($categories as $category)
                @if ($category->category_name == "Special Food")
                    @foreach ($restaurants->where('category_id', $category->id) as $restaurant)
                        @if ($restaurant->category_id == 6)
                            <div class="item">
                                <a class="media-thumb" href="{{ asset('storage/' . $restaurant->restaurant_image) }}" data-fancybox="gallery">
                                    <div class="media-text">
                                        <h3>{{ $restaurant->restaurant_name }}</h3>
                                        <span class="location">{{ $restaurant->city }}</span>
                                    </div>
                                    <img src="{{ asset('storage/' . $restaurant->restaurant_image) }}" alt="Image" class="img-fluid imgsize">
                                </a>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
</div>
