<!doctype html>
<html lang="en">
<base href="/public">
@include('User.css')

<body>


	@include('User.nav')



  <div class="hero hero-inner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mx-auto text-center">
          <div class="intro-wrap">
            <h1 class="mb-0">Booking </h1>
            <p class="text-white">Let make your tripe comfortable. </p>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Accomodations -->
<!-- Page Content -->




<div class="untree_co-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="owl-single dots-absolute owl-carousel">
                    @if ($hotel->hotel_image)
                    <img src="{{ asset('storage/' . $hotel->hotel_image) }}" style="height: 450px;"  class="img-fluid rounded-20">
                @else
                    <div class="img-placeholder rounded-20" style="width: 100%; height: 300px; background-color: #ccc; text-align: center; line-height: 300px;">
                        No Image
                    </div>
                @endif
                </div>
            </div>
            <div class="col-lg-5 pl-lg-5 ml-auto">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <!-- Room Details -->
            <h2 class="section-title mb-4">{{ $hotel->hotel_name }}</h2>
            <p>{{ $hotel->description }}</p>

            <div>
                <strong>Star Rating:</strong>
                @for ($i = 1; $i <= $hotel->rate; $i++)
                    <span class="icon-star text-primary"></span>
                @endfor
            </div>

            <div>
                <strong>Price Per Night:</strong>
                <span>  {{ $hotel->price }} Tsh</span>
            </div>


                <ul class="list-unstyled two-col clearfix pt-4">
                        <li><i class="fas fa-coffee"></i> Breakfast</li>


                        <li><i class="fas fa-swimmer"></i> Swimming Pool</li>


                        <li><i class="fas fa-anchor"></i> Sea Adventure</li>


                        <li><i class="fas fa-ship"></i> Jet Ski Freestyle</li>

                </ul>
                <form action="{{ route('hotel-booking', ['id' => $hotel->id, 'userId' => $user->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="form-wrapper">
                            <label for="check_in_date">Check-in Date</label>
                            <input type="date" name="check_in_date" id="check_in_date" class="form-control" required>
                        </div>
                        <div class="form-wrapper">
                            <label for="check_out_date">Check-out Date</label>
                            <input type="date" name="check_out_date" id="check_out_date" class="form-control" required>
                        </div>
                    </div>
                    <p><button type="submit" class="btn btn-primary btn-shadow">Booking Now</button></p>
                </form>

            </div>
        </div>
    </div>
</div>






<div class="py-5 cta-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h2 class="mb-2 text-white">Lets you Explore the Best. Contact Us Now</h2>
                <p class="mb-4 lead text-white text-white-opacity">Let us be your best service provider when you are in Zanzibar</p>
                <p class="mb-0"><a href="booking.html" class="btn btn-outline-white text-white btn-md font-weight-bold">Get in touch</a></p>
            </div>
        </div>
    </div>
</div>



{{--

<div class="untree_co-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-6">
                <h2 class="section-title text-center mb-3">{{ $offers->offer_title }} &amp; Discounts</h2>
                <p>
                    We offer the best deals and discounts on our tours to make your travel experience more affordable.
                </p>
            </div>
        </div>
        <div class="row">
            @foreach ($hotelsOffer as $hotel)
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="media-1 position-relative">
                        <div class="ribbon-wrapper">
                            <div class="ribbon">50% OFF</div>
                        </div>
                        <a href="#" class="d-block mb-3">
                            @if ($hotel->hotel_image)
                                <img src="{{ asset('storage/' . $hotel->hotel_image) }}" alt="Image" class="img-fluid imgsize">
                            @else
                                No Image
                            @endif
                        </a>
                        <span class="loc mb-2">
                            <span class="icon-room mr-3"></span>
                            <span>{{ $hotel->hotel_name }}</span>
                        </span>
                        <div class="pt-2">
                            <div>
                                <h3><a href="#">{{ $hotel->city }}</a></h3>
                                <div class="price ml-auto">
                                    <span>{{ $hotel->price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
 --}}





@include('User.footer')

@include('User.copywrite')
<!-- Scripts -->


@include('User.script')




