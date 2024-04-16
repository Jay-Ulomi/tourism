<!doctype html>
<html lang="en">
{{-- <base href="/public"> --}}

@include('User.css')
<!-- Add this in your HTML head section -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>





<body>


	@include('User.nav')

    <div class="hero hero-inner">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
              <div class="intro-wrap">
                <h1 class="mb-0">Profile </h1>

              </div>
            </div>
          </div>
        </div>
      </div>

<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
            <h1>{{ $uniqueUsername }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"><!--left col-->
            <form id="upload-form" enctype="multipart/form-data">
                @csrf
                <div class="text-center">
                    <img id="preview-image" class="avatar img-circle img-thumbnail" alt="avatar" style="height: 120px;">
                    <h6>Upload a different photo...</h6>
                    <input type="file" id="file-input" name="image" class="text-center center-block file-upload">
                </div>
            </form>

            <br>

            <div class="panel panel-default">
                <div class="panel-heading">Plan Type <i class="fa fa-link fa-1x"></i></div>
                <ul class="list-group listbox">
                    @php
                    $planTitles = [];
                    @endphp
                    @foreach ($bookingPlans as $bookingPlan)
                    @if($bookingPlan)
                        @php
                            $plan = App\Models\Plan::find($bookingPlan->plan_id); // Retrieve the plan using plan_id
                            if ($plan) {
                                $planTitles[] = $plan->title; // Access the title of the plan
                            }
                        @endphp
                        <li class="list-group-item text-right"><span class="pull-left"><strong>{{ implode(', ', $planTitles) }}</strong></span> {{ $bookingPlan->totalPrice }}</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Number People</strong></span> {{ $bookingPlan->numberOfPeople }}</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Check In</strong></span> {{ $bookingPlan->start_at }}</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Check Out</strong></span> {{ $bookingPlan->end_at }}</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Status</strong></span> {{ $bookingPlan->booking_status }}</li>
                        @else
                        <li class="list-group-item text-muted">No Plan Assigned Yet!</li>
                    @endif
                    @endforeach
                </ul>
            </div>

            @if ($bookingHotel)
            <ul class="list-group listbox">
                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>{{ $bookingHotel->hotel_name }}</strong></span> {{ $bookingHotel->price }}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Chack In</strong></span> {{ $bookingHotel->pivot->check_in_date }}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Check Out</strong></span> {{$bookingHotel->pivot->check_out_date  }}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Status</strong></span> {{$bookingHotel->pivot->booking_status }}</li>
            </ul>
            @else
            <ul class="list-group listbox">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>No booking </strong></span></li>
                <li href="#" class="list-group-item">No Hotel Booked Yet!</li>
            </ul>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Social Media</div>
                <div class="panel-body">
                    <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
                    <div id="calendar"></div>
                </div>
            </div>
        </div><!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                <li><a data-toggle="tab" href="#messages">Plan Booking</a></li>
                <li><a data-toggle="tab" href="#settings">Hotel Booking</a></li>
              </ul>


          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="first_name" value="{{ $profile->first_name }}" id="first_name" placeholder="first name" title="enter your first name if any.">
                          </div>


                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control" name="last_name" value="{{ $profile->last_name }}" id="last_name" placeholder="last name" title="enter your last name if any.">
                          </div>
                      </div>

                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                          </div>

                          <div class="col-xs-6">
                          <label for="email"><h4>Email</h4></label>
                          <input type="email" class="form-control" name="email" id="email" value="{{ $profile->email }}" placeholder="you@email.com" title="enter your email.">
                      </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="email"><h4>Nationality</h4></label>
                              <input type="text" class="form-control" name="nationality" value="{{ $profile->nationality }}"  id="nationality" placeholder="nationality" title="enter your email.">
                          </div>


                          <div class="col-xs-6">
                              <label for="email"><h4>City</h4></label>
                              <input type="text" class="form-control" id="location" name="city" value="{{ $profile->city }}"  placeholder="somewhere" title="enter a location">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password"  id="password" placeholder="password" title="enter your password.">
                          </div>


                          <div class="col-xs-6">
                            <label for="password2"><h4>Verify</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
              	</form>

              <hr>

             </div><!--/tab-pane-->
             <div class="tab-pane" id="messages">
                <h2>Booking Details</h2>
                <hr>
                <form class="form" action="##" method="post" id="registrationForm">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="tablecolor" >
                                <tr>
                                    <th>Plan Type</th>
                                    <th>Total Price</th>
                                    <th>Number of People</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookingPlans as $bookingPlan)
                                @if ($bookingPlan)
                                <tr>
                                    @php
                                    $plan = App\Models\Plan::find($bookingPlan->plan_id);
                                    @endphp
                                    <td>{{ $plan ? $plan->title : 'Unknown' }}</td>
                                    <td>{{ $bookingPlan->totalPrice }}</td>
                                    <td>{{ $bookingPlan->numberOfPeople }}</td>
                                    <td>{{ $bookingPlan->start_at }}</td>
                                    <td>{{ $bookingPlan->end_at }}</td>
                                    <td>{{ $bookingPlan->booking_status }}</td>
                                    <td>
                                        <a href="{{ route('editBooking', $bookingPlan->id) }}"><i class="fas fa-edit"></i></a>
                                        /
                                        <a href="#" onclick="deleteBooking({{ $bookingPlan->id }})"><i class="fas fa-trash"></i></a>
                                    </td>

                                </tr>
                                @else
                                <tr>
                                    <td colspan="3">No booking found for this user.</td>
                                </tr>
                            @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <canvas id="journeyChart" width="800" height="400"></canvas>
                    <div id='calendar'></div>






                    <div class="form-group">
                        <div class="col-xs-12">
                            <br>
                            <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                            <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                        </div>
                    </div>
                </form>
            </div><!--/tab-pane-->

             <div class="tab-pane" id="settings">


                  <hr>
                  <form class="form" action="{{ route('upload-image') }}" method="post" id="registrationForm">
                    @csrf

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Hotel Name</th>
                                    <th>Check-in Date</th>
                                    <th>Check-out Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($bookingHotel)
                                    <tr>
                                        <td>{{ $bookingHotel->hotel_name }}</td>
                                        <td>{{ $bookingHotel->pivot->check_in_date }}</td>
                                        <td>{{ $bookingHotel->pivot->check_out_date }}</td>
                                        <td>{{$bookingHotel->pivot->booking_status }}</td>
                                        <td>
                                            <a href="{{ route('editBooking', $bookingHotel->id) }}"><i class="fas fa-edit"></i></a> /
                                            <form action="{{ route('deleteBooking', $bookingHotel->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>

                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="3">No booking found for this user.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>


                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                      </div>
              	</form>
              </div>

              </div><!--/tab-pane-->
          </div><!--/tab-content-->
        </div><!--/col-9-->
    </div><!--/row-->
</div><!--/container-->


<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    function displayImage() {
        $.ajax({
            url: '{{ route("get-image") }}', // Use the named route to fetch the image path
            type: 'GET',
            success: function(response) {
                // Convert the image path to an actual image and set it as the source
                var img = new Image();
                img.onload = function() {
                    $('#preview-image').attr('src', img.src); // Set the image source
                };
                img.onerror = function() {
                    console.error('Error loading image: ' + response.image_path);
                };
                img.src = response.image_path; // Set the image URL
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Call the displayImage function on page load
    displayImage();

    $("#file-input").on('change', function(){
        uploadImage();
    });

    // Function to handle image upload
    function uploadImage() {
        var formData = new FormData($('#upload-form')[0]);

        $.ajax({
            url: '{{ route("upload-image") }}', // Use the named route for image upload
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Handle successful upload
                console.log(response);
                $('#preview-image').attr('src', response.image_path); // Update image source
            },
            error: function(xhr, status, error) {
                // Handle upload errors
                console.error(xhr.responseText);
            }
        });
    }
});
</script>
<script>
    var ctx = document.getElementById('journeyChart').getContext('2d');

    // Prepare data for the chart
    var labels = [];
    var data = [];

    // Loop through the booking plans to extract start and end dates
    @foreach ($bookingPlans as $bookingPlan)
        var startDate = new Date('{{ $bookingPlan->start_at }}');
        var endDate = new Date('{{ $bookingPlan->end_at }}');

        // Push each month between start and end dates to labels array
        var currentDate = new Date(startDate);
        while (currentDate <= endDate) {
            var month = currentDate.toLocaleString('default', { month: 'long' });
            labels.push(month);
            currentDate.setMonth(currentDate.getMonth() + 1);
        }

        // Calculate the duration in months and push it to the data array
        var durationInMonths = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24 * 30));
        data.push(durationInMonths);
    @endforeach

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Booking Journey',
                data: data,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    function deleteBooking(bookingId) {
        if (confirm("Are you sure you want to delete this booking?")) {
            fetch("{{ route('deleteBooking', ':id') }}".replace(':id', bookingId), {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Handle success response
                console.log(data);
                location.reload(); // Reload the page
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
        }
    }
</script>







