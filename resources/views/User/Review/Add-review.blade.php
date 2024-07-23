<!doctype html>
<html lang="en">
<head>
    @include('User.css')
    <style>


    </style>
</head>
<body>

    @include('User.nav')

    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Reviews</h1>
                        <p  class="text-white">See how people comment about us and rate us</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div id="review-container">
                @if ($reviews->isEmpty())
                    <p>No reviews yet. Be the first to review the website.</p>
                @else
                    @foreach ($reviews as $review)
                        <div class="review">
                           @if ($review->user->profileimage)
                          <img src="{{ asset('storage/' . $review->user->profileimage->image_path) }}" alt="User Profile Image" class="rounded-circle shadow-1 mb-4 mb-lg-0" width="50" height="50" />
                          @else
                          @php
                          $initials = strtoupper(substr($review->user->first_name, 0, 1) . substr($review->user->last_name, 0, 1));
                          @endphp
                          <div class="default-avatar rounded-circle shadow-1 mb-4 mb-lg-0 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background-color: #6c757d; color: white; font-size: 24px;">
                            {{ $initials }}
                          </div>
                          @endif
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
                @endif
            </div>
            <div class="load-more">
                <button id="load-more-btn">Load More</button>
            </div>

            @auth
                <h2 class="text-center">Leave a Review</h2>
                <form action="{{ route('reviews.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Your Title" required>
                    </div>
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
                        <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            @endauth

            @guest
                <p>Please <a href="{{ route('login') }}">login</a> to leave a review.</p>
            @endguest
        </div>
    </div>

    @include('User.footer')
    @include('User.script')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let reviewCount = 3;
            const reviews = document.querySelectorAll('.review');
            const loadMoreBtn = document.getElementById('load-more-btn');

            function showReviews(count) {
                reviews.forEach((review, index) => {
                    if (index < count) {
                        review.style.display = 'flex';
                    } else {
                        review.style.display = 'none';
                    }
                });
            }

            loadMoreBtn.addEventListener('click', function() {
                reviewCount += 3;
                showReviews(reviewCount);
            });

            showReviews(reviewCount);
        });
    </script>
</body>
</html>
