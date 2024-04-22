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
      @include('User.Modal.Information-Payment')
    {{-- <script src="https://use.fontawesome.com/2d1c7583b1.js"></script> --}}

    <section class="container">
        <section class="content">
            <article id="checkoutNav" class="shadow">
                <ul>
                    @foreach ($plan->info as $category)
                    <li>
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        <p>{{ $category }}</p>
                    </li>
                    @endforeach
                </ul>
            </article>
            <article id="product" class="shadow"><img src="registration/images/p1.jpg" alt="Lunar 2"></article>
            <article id="checkoutCard" class="shadow">
                <form action="{{ route('planstore', ['planId' => $plan->id]) }}" method="POST" id="checkoutForm">
                    @csrf
                    <div id="details">
                        <dl>
                            <dt>Product</dt>
                            <dd><input type="hidden" name="title" value="{{ $plan->title }}">{{ $plan->title }}</dd> <!-- Display the product title without an input field -->

                            <dt># People</dt>
                            <dd><input type="number" name="numberOfPeople" id="numberOfPeople" value="1" onchange="updateTotalPrice()"></dd> <!-- Input field for number of people -->

                            <!-- Hidden input fields for price and total price -->
                            <input type="hidden" name="price" id="price" value="{{ $plan->price }}">
                            <input type="hidden" name="totalPrice" id="totalPrice" value="{{ $plan->price }}">

                            <!-- Display total price dynamically based on the number of people -->
                            <dt>Total Price</dt>
                            <dd id="displayTotalPrice">{{ $plan->price }}</dd>
                        </dl>

                        <dl>
                            <dt>Check In</dt>
                            <dd><input type="date" name="start_at" id="startAt" required></dd>

                            <dt>Check Out</dt>
                            <dd><input type="date" name="end_at" id="endsAt" required></dd>

                            <dt></dt>
                        </dl>
                    </div>
                    <input type="submit" value="Check out" id="btnSubmit">
                </form>
            </article>

            <script>
                function updateTotalPrice() {
                    // Get the number of people and the price
                    var numberOfPeople = parseInt(document.getElementById('numberOfPeople').value);
                    var price = parseFloat(document.getElementById('price').value);

                    // Calculate the total price
                    var totalPrice = numberOfPeople * price;

                    // Update the total price display
                    document.getElementById('displayTotalPrice').innerText = totalPrice.toFixed(2);
                    document.getElementById('totalPrice').value = totalPrice.toFixed(2); // Update hidden input field value
                }
            </script>
<script>
    document.getElementById('btnSubmit').addEventListener('click', function() {
        document.getElementById('checkoutForm').submit();
    });
</script>

<script>
    // Get the modal element
    const modal = new bootstrap.Modal(document.getElementById('exampleModal'));

    // Open the modal when the page loads
    window.addEventListener('DOMContentLoaded', function() {
        modal.show();
    });
</script>
