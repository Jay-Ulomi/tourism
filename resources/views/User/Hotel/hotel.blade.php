<!doctype html>
<html lang="en">
@include('User.css')

<body>


	@include('User.nav')



  <div class="hero hero-inner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mx-auto text-center">
          <div class="intro-wrap">
            <h1 class="mb-0">Accomodation</h1>
            <p class="text-white">We are best in provide the quality accomodation to our clients and safety. </p>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Accomodations -->
<!-- Page Content -->

@foreach ($categories as $category)
@if (in_array($category->category_name, ["Gold", "Silver"]))
    <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-6">
                    <h2 class="section-title text-center mb-3">{{ $category->category_name }} &amp; Accommodation</h2>
                    <p>
                        We offer the best deals and discounts on our tours to make your travel experience more affordable.
                    </p>
                </div>
            </div>
            <div class="row">
                @php $count = 0; @endphp
                @foreach ($hotels->where('category_id', $category->id) as $hotel)
                    @if (in_array($hotel->category_id, [1, 3]) && $count < 4)
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <div class="media-1">
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
                                            <span>${{ $hotel->price }}</span>
                                        </div>
                                        <div class="price ml-auto pt-2">

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
                        @php $count++; @endphp
                    @endif
                @endforeach
            </div>
            <a class="more" href="{{ route('ShowHotel', $category->id) }}">More</a>
        </div>
    </div>
    @endif
@endforeach











@include('User.action')



@include('User.special')


@include('User.footer')

@include('User.copywrite')
<!-- Scripts -->


@include('User.script')




