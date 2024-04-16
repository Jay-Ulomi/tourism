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
            <h1 class="mb-0">Destination</h1>
            <p class="text-white">We are best in provide the quality Destination to our clients and safety. </p>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Accomodations -->
<!-- Page Content -->
   <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-6">
                    <h2 class="section-title text-center mb-3">Destination &amp; Good place</h2>
                    <p>
                        We offer the best deals and discounts on our tours to make your travel experience more affordable.
                    </p>
                </div>
            </div>
            <div class="row ">
                @if ($destinations->count() > 0)
                @foreach ($destinations as $destination)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0 pt-5 ">
                        <div class="media-1">
                            <a href="#" class="d-block mb-3">
                                @if ($destination->destination_images)
                                <img src="{{ asset('storage/' . $destination->destination_images) }}" alt="Image" class="img-fluid imgsize">
                            @else
                                No Image
                            @endif
                            </a>
                            <span class="loc mb-2">
                                <span class="icon-room mr-3"></span>
                                <span>{{ $destination->city }}</span>
                            </span>
                            <div class="pt-2">
                                <div>
                                    <h3><a href="#">{{ $destination->destination_name }}</a></h3>
                                    <div class="price ml-auto">
                                        <span>${{ $destination->price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @else
                <p>No hotels found in this Destination.</p>
                  @endif
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


@include('User.special')

{{-- <div class="untree_co-section">
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
</div> --}}






@include('User.footer')

@include('User.copywrite')
<!-- Scripts -->


@include('User.script')




