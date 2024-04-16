
<div class="untree_co-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-6">
                <h2 class="section-title text-center mb-3">Hotels</h2>
                <p>
                    Best Hotel with high Rate.
                </p>
            </div>
        </div>
        <div class="row">
            @foreach ($hotelsOffer as $hotel)
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="hotel position-relative">
                        <a href="{{ route('user-bookings',$hotel->id) }}" class="d-block mb-3">
                            @if ($hotel->hotel_image)
                                <img src="{{ asset('storage/' . $hotel->hotel_image) }}" alt="Image" class="img-fluid imgsize">
                            @else
                                No Image
                            @endif
                        </a>
                        <span class="loc mb-2">
                            <span class="icon-room mr-3"></span>
                            <span>{{ $hotel->city }}</span>
                        </span>
                        <div class="pt-2">
                            <div>
                                <h3><a href="#">{{ $hotel->hotel_name }}</a></h3>
                                <div class="price ml-auto">

                                    @if($hotel->rate >= 4.5)
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> <!-- 5 stars -->
                                    @elseif($hotel->rate >= 4)
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i> <!-- 4.5 stars -->
                                    @elseif($hotel->rate >= 3.5)
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> <!-- 4 stars -->
                                    @elseif($hotel->rate >= 3)
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> <!-- 3.5 stars -->
                                    @elseif($hotel->rate >= 2.5)
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> <!-- 3 stars -->
                                    @elseif($hotel->rate >= 2)
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> <!-- 2.5 stars -->
                                    @elseif($hotel->rate >= 1.5)
                                        <i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> <!-- 2 stars -->
                                    @elseif($hotel->rate >= 1)
                                        <i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> <!-- 1.5 stars -->
                                    @else
                                        <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> <!-- 1 star -->
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>



