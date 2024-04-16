<!doctype html>
<html lang="en">
<base href="/public">
@include('User.css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
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
 <!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4" style="text-align: center;  text-transform: uppercase; font-size: 32px;">Booking Form</h6>
                <form action="{{ route('store_info') }}" method="POST"  enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <div class="form-wrapper">
                            <label for="">Hotel Rate</label>
                            <select type="text" name="rate" class="form-control">
                                <option selected disabled>Select Hotel Rating*</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="form-wrapper">
                            <label for="">Hotel Name</label>
                            <select name="hotel_name" class="form-control">
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-wrapper">
                            <label for="">Destinations</label>
                            <select name="destination" class="form-control" id="destination">
                                <option value="" selected disabled>Select Destination</option>
                                @foreach($destinations as $destination)
                                    <option value="{{ $destination->id }}">{{ $destination->destination_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-wrapper">
                            <label for="">Historical Sites</label>
                            <select name="historical_site" class="form-control" id="historicalSite">
                                <option value="" selected disabled>Select Historical Site</option>
                                @foreach($historicalSites as $historicalSite)
                                    <option value="{{ $historicalSite->id }}">{{ $historicalSite->history_name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="form-wrapper">
                            <label for="">Start Date</label>
                            <input type="date" id="startDate" name="startDate" class="form-control">

                        </div>
                        <div class="form-wrapper">
                            <label for="">End Date</label>
                            <input  type="date" id="endDate" name="endDate" class="form-control">

                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary ">Booking Now</button>
                </form>
            </div>
        </div>
    </div>
</div>






@include('User.footer')

@include('User.copywrite')
<!-- Scripts -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<!-- Include jQuery (you can replace this with a CDN link or download the library) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Your script to fetch hotel names based on the selected rate -->
<script>
    $(document).ready(function () {
        // Event handler for the change event on the rate select
        $('select[name="rate"]').on('change', function () {
            var selectedRate = $(this).val();

            // Make an AJAX request to fetch hotel names based on the selected rate
            $.ajax({
                url: '/getHotelNames',
                method: 'GET',
                data: { rate: selectedRate },
                success: function (data) {
                    // Clear existing options in the hotel name select
                    $('select[name="hotel_name"]').empty();

                    // Populate the hotel name select with the fetched data
                    $.each(data, function (index, hotelName) {
                        $('select[name="hotel_name"]').append('<option value="' + hotelName + '">' + hotelName + '</option>');
                    });
                },
                error: function () {
                    alert('Error fetching hotel names.');
                }
            });
        });
    });


</script>






@include('User.script')
