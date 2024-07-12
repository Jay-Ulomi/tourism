
<style>
   .untree_co-section {
  padding: 60px 0;
}

.section-title {
  font-size: 2.5rem;
  font-weight: 700;
  margin-bottom: 30px;
}

.card {
  border: none;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  background-color: black;
}

.carousel-indicators button {
  background-color: black;
}

.carousel-inner {
  text-align: center;
}

.carousel-item {
  transition: transform 0.5s ease, opacity 0.5s ease;
}

.carousel-item img {
  border: 5px solid #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

</style>
<section class="untree_co-section">
  <div class="container my-5 py-5">
    <div class="row text-center justify-content-center mb-5">
        <div class="col-lg-7">
            <h2 class="section-title text-center"> Customers Reviews</h2>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
      <div class="col-md-12">
        <div class="text-center mb-4 pb-2">
          <i class="fas fa-quote-left fa-3x text-black"></i>
        </div>

        <div class="card">
          <div class="card-body px-4 py-5">
            <!-- Carousel wrapper -->
            <div id="carouselDarkVariant" data-mdb-carousel-init class="carousel slide carousel-dark" data-mdb-ride="carousel">
              <!-- Indicators -->
              <div class="carousel-indicators mb-0">
                <button data-mdb-button-init data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="0" class="active"
                  aria-current="true" aria-label="Slide 1"></button>
                <button data-mdb-button-init data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="1"
                  aria-label="Slide 1"></button>
                <button data-mdb-button-init data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="2"
                  aria-label="Slide 1"></button>
              </div>

              <!-- Inner -->
              <div class="carousel-inner pb-5">
                <!-- Single item -->
                @foreach ($webreviews as $index => $webreview)

                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                  <div class="row d-flex justify-content-center  text-black">
                    <div class="col-lg-10 col-xl-8">
                      <div class="row">
                        <div class="col-lg-4 d-flex justify-content-center">

                            @if ($webreview->user->profileimage)
                            <img src="{{ asset('storage/' . $webreview->user->profileimage->image_path) }}" alt="User Profile Image" class="rounded-circle shadow-1 mb-4 mb-lg-0" width="150" height="150" />
                          @else
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp" class="rounded-circle shadow-1 mb-4 mb-lg-0" alt="woman avatar" width="150" height="150" />
                          @endif
                        </div>
                        <div
                          class="col-9 col-md-9 col-lg-7 col-xl-8 text-center text-lg-start mx-auto mx-lg-0">
                          <h4 class="mb-4">{{$webreview->user->first_name}} {{$webreview->user->last_name}} - {{$webreview->title}}</h4>
                          <p class="mb-0 pb-3">
                            {{$webreview->comment}}
                          </p>
                          <ul class="list-unstyled d-flex justify-content-center">
                              @for ($i = 0; $i < $webreview->rating; $i++)
                                <li><i class="fas fa-star fa-sm text-info"></i></li>
                              @endfor
                              @for ($i = $webreview->rating; $i < 5; $i++)
                                <li><i class="far fa-star fa-sm text-info"></i></li>
                              @endfor
                            </ul>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>

                @endforeach


              </div>
              <!-- Inner -->

              <!-- Controls -->

            </div>
            <!-- Carousel wrapper -->
          </div>
        </div>

        <div class="text-center mt-4 pt-2">
          <i class="fas fa-quote-right fa-3x text-black"></i>
        </div>
      </div>
    </div>
  </div>
</section>
