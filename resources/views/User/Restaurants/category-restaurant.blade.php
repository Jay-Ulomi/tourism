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
                <h1 class="mb-0">Restaurants & Cafes </h1>
                <p class="text-white">We are best in provide the quality restaurants to our clients . </p>
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
                    <h2 class="section-title text-center mb-3">{{ $category->category_name }} </h2>
                    <p>
                        We offer the best deals and discounts on our tours to make your travel experience more affordable.
                    </p>
                </div>
            </div>
            <div class="row ">
                @if ($restaurants->count() > 0)
                @foreach ($restaurants as $restaurant)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0 pt-5 ">
                        <div class="media-1">
                            <a href="#" class="d-block mb-3">
                                @if ($restaurant->restaurant_image)
                                <img src="{{ asset('storage/' . $restaurant->restaurant_image) }}" alt="Image" class="img-fluid imgsize">
                            @else
                                No Image
                            @endif
                            </a>
                            <span class="loc mb-2">
                                <span class="icon-room mr-3"></span>
                                <span>{{ $restaurant->city }}</span>
                            </span>
                            <div class="pt-2">
                                <div>
                                    <h3><a href="#">{{ $restaurant->restaurant_name }}</a></h3>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @else
                <p>No hotels found in this category.</p>
                  @endif
            </div>

        </div>
    </div>










@include('User.action')



@include('User.special')







@include('User.footer')

@include('User.copywrite')
<!-- Scripts -->


@include('User.script')




