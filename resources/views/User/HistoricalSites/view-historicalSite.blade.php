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
            <h1 class="mb-0">Historical Sites</h1>
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
                    <h2 class="section-title text-center mb-3">Historical Sites</h2>
                    <p>
                       We offer special historical site in our tour
                    </p>
                </div>
            </div>
            <div class="row ">
                @if ($historical->count() > 0)
                @foreach ($historical as $history)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0 pt-5 ">
                        <div class="media-1" onclick="window.location='{{ route('history', ['id' => $history->id]) }}'">
                            <a href="#" class="d-block mb-3">
                                @if ($history->history_image)
                                <img src="{{ asset('storage/' . $history->history_image) }}" alt="Image" class="img-fluid imgsize">
                            @else
                                No Image
                            @endif
                            </a>
                            <span class="loc mb-2">
                                <span class="icon-room mr-3"></span>
                                <span>{{ $history->city }}</span>
                            </span>
                            <div class="pt-2">
                                <div>
                                    <h3><a href="#">{{ $history->history_name }}</a></h3>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @else
                <p>No Historical Site  found in this History.</p>
                  @endif
            </div>

        </div>
    </div>











@include('User.action')


@include('User.special')
<!-- loader -->






@include('User.footer')

@include('User.copywrite')
<!-- Scripts -->


@include('User.script')




