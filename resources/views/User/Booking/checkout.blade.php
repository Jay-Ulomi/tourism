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
                <h1 class="mb-0">Payment </h1>
                <p class="text-white">Let make your tripe comfortable. </p>
              </div>
            </div>
          </div>
        </div>
      </div>


    <section class="container">
        <section class="content">
            <article id="checkoutNav" class="shadow">
                <ul>
                    <li>
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        <p></p>
                    </li>
                </ul>
            </article>
            <article id="product" class="shadow"><img src="registration/images/p1.jpg" alt="Lunar 2"></article>
            <article id="checkoutCard" class="shadow">
                <form action="" method="POST" id="checkoutForm">
                    @csrf
                    <div id="details">
                        <dl>
                            <dt>Product</dt>
                            <dd><input type="hidden" name="title" value=""></dd> <!-- Display the product title without an input field -->

                            <dt># People</dt>
                            <dd><input type="number" name="numberOfPeople" id="numberOfPeople" value="1" onchange="updateTotalPrice()"></dd> <!-- Input field for number of people -->

                            <!-- Display total price dynamically based on the number of people -->
                            <dt>Total Price</dt>
                            <dd id="displayTotalPrice"></dd>
                        </dl>
                    </div>



                    <div id="cards">

                        <ul>
                        <li><label for="" name="Card Type">Card Type</label></li>
                            <li><i class="fa fa-cc-visa" aria-hidden="true"></i></li>
                            <li><i class="fa fa-cc-paypal" aria-hidden="true"></i></li>
                            <li><i class="fa fa-cc-amex" aria-hidden="true"></i></li>
                            <li><i class="fa fa-cc-mastercard" aria-hidden="true"></i></li>
                        </ul>
                    </div>
                    <div id="cardNumber">
                        <label for="">Card number</label>
                        <input type="number" placeholder="XXXX">
                        <input type="number" placeholder="XXXX">
                        <input type="number" placeholder="XXXX">
                        <input type="number" placeholder="XXXX">
                    </div>
                    <div id="securityInfo">
                        <label for="">Start date</label>
                        <label for="">Expiry date</label>
                        <label for="">Cvv</label>
                        <input type="text" placeholder="MM/YY">
                        <input type="text" placeholder="MM/YY">
                        <input type="number" placeholder="XXX">
                    </div>

                    <input type="submit" value="Check out" id="btnSubmit">
                </form>
            </article>


<script>
    document.getElementById('btnSubmit').addEventListener('click', function() {
        document.getElementById('checkoutForm').submit();
    });
</script>

