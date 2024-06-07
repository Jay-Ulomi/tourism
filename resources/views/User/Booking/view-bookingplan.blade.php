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
            @foreach ($plans as $plan)
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="plan">
                        <div class="inner py-5">

                                <span class="pricing">
                                    <span>
                                        {{-- {{ $plan->price }} --}}
                                    </span>
                                </span>
                                <p class="title">{{ $plan->title }}</p>
                                <p class="info">{{ $plan->description }}</p>

                                <ul class="features">
                                    @foreach ($plan->info as $category)
                                        <li>
                                            <span class="icon">
                                                <svg height="24" width="24" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                                    <path fill="currentColor"
                                                        d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                                                </svg>
                                            </span>
                                            <span><strong>{{ $category }}</strong></span>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="action">
                                    <a class="button" href="{{ route('payment',$plan->id) }}">
                                        Choose plan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

        </div>
    </div>
</div>




{{--
    <div class="py-5 cta-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="mb-2 text-white">You can customize your own Plan </h2>
                    <p class="mb-4 lead text-white text-white-opacity">You can select everything that you need in your tour </p>
                    <p class="mb-0"><a href="{{ route('info-plan') }}" class="btn btn-outline-white text-white btn-md font-weight-bold">Start Planning Now</a></a></p>
                </div>
            </div>
        </div>
    </div> --}}















@include('User.footer')

@include('User.copywrite')
<!-- Scripts -->


@include('User.script')




