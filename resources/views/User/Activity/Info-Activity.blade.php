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
                        <h1 class="mb-0">Activity</h1>
                        <p class="text-white">Let make your trip comfortable. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="owl-single dots-absolute owl-carousel">
                        @if ($activity->image1)
                            <img src="{{ asset('storage/' . $activity->image1) }}" style="height: 450px;" class="img-fluid rounded-20">
                        @else
                            <div class="img-placeholder rounded-20" style="width: 100%; height: 300px; background-color: #ccc; text-align: center; line-height: 300px;">
                                No Image
                            </div>
                        @endif
                        <img src="{{ asset('storage/' . $activity->image2) }}" style="height: 450px;" class="img-fluid rounded-20">
                        <img src="{{ asset('storage/' . $activity->image3) }}" style="height: 450px;" class="img-fluid rounded-20">
                        <img src="{{ asset('storage/' . $activity->image4) }}" style="height: 450px;" class="img-fluid rounded-20">
                    </div>
                </div>
                <div class="col-lg-5 pl-lg-5 ml-auto">

                    <h2 class="section-title mb-4">{{ $activity->title }}</h2>
                    <p>{{ $activity->description }}</p>

                    <h2>Reviews</h2>
                    @if ($reviews->isEmpty())
                        <p>No reviews yet. Be the first to review this activity.</p>
                    @else
                        @foreach ($reviews as $index => $review)
                            <div class="review  {{ $index >= 2 ? 'd-none' : '' }}">
                             <img src="{{ $review->user->profileimage ? asset('storage/' . $review->user->profileimage->image_path) : asset('default-profile.png') }}"
                                     alt="User Profile Image" class="rounded-circle shadow-1" width="50" height="50" />
                                <div class="review-details">
                                    <strong>{{ $review->user->first_name }} {{ $review->user->last_name }}</strong>
                                    <div class="star-rating">
                                        @for ($i = 0; $i < $review->rating; $i++)
                                            &#9733;
                                        @endfor
                                        @for ($i = $review->rating; $i < 5; $i++)
                                            &#9734;
                                        @endfor
                                    </div>
                                    <p>{{ $review->comment }}</p>
                                </div>
                            </div>
                        @endforeach
                        @if (count($reviews) > 2)
                            <button id="show-more-btn" class="btn btn-link">Show More</button>
                        @endif
                    @endif

                    @auth
                        <h2>Leave a Review</h2>
                        <form action="{{ route('reviews-activities.store', $activity->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <select name="rating" id="rating" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="comment">Comment</label>
                                <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </form>
                    @endauth

                    @guest
                        <p>Please <a href="{{ route('login') }}">login</a> to leave a review.</p>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    @include('User.action')
    @include('User.footer')
    @include('User.copywrite')
    @include('User.script')

    <script>
        document.getElementById('show-more-btn').addEventListener('click', function () {
            const hiddenReviews = document.querySelectorAll('.review.d-none');
            hiddenReviews.forEach(function (review) {
                review.classList.remove('d-none');
            });
            this.style.display = 'none';
        });
    </script>
</body>
</html>
