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
            <h1 class="mb-0">Historical Site </h1>
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
                    @if ($HistoricalSite->history_image)
                    <img src="{{ asset('storage/' . $HistoricalSite->history_image) }}" style="height: 450px;"  class="img-fluid rounded-20">
                @else
                    <div class="img-placeholder rounded-20" style="width: 100%; height: 300px; background-color: #ccc; text-align: center; line-height: 300px;">
                        No Image
                    </div>
                @endif
                <img src="{{ asset('storage/' . $HistoricalSite->image2) }}" style="height: 450px;"  class="img-fluid rounded-20">
                <img src="{{ asset('storage/' . $HistoricalSite->image3) }}" style="height: 450px;"  class="img-fluid rounded-20">
                <img src="{{ asset('storage/' . $HistoricalSite->image4) }}" style="height: 450px;"  class="img-fluid rounded-20">
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
            <h2 class="section-title mb-4">{{ $HistoricalSite->history_name }}</h2>
            <p>{{ $HistoricalSite->description }}</p>
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


@include('User.footer')

@include('User.copywrite')
<!-- Scripts -->


@include('User.script')




