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
                        <h1 class="mb-0">Activities</h1>
                        <p class="text-white"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Activities Section -->
    <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                {{-- <div class="col-lg-6">
                    <h2 class="section-title text-center mb-3">Historical Sites</h2>
                    <p>
                        We offer special historical site in our tour
                    </p>
                </div> --}}
            </div>
            <div class="row">
                @if ($activities->count() > 0)
                    @foreach ($activities as $activity)
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0 pt-5">
                            <div class="media-1" onclick="window.location.href='{{ route('activities.show-activity', $activity->id) }}'">
                                <a href="{{ route('activities.show-activity', $activity->id) }}" class="d-block mb-3">
                                    @if ($activity->image1)
                                        <img src="{{ asset('storage/' . $activity->image1) }}" alt="Image" class="img-fluid imgsize">
                                    @else
                                        <img src="URL_TO_PLACEHOLDER_IMAGE" alt="No Image" class="img-fluid imgsize">
                                    @endif
                                </a>

                                <div style="padding-bottom: 10px;">

                                     <h3>
                                        <a href="{{ route('activities.show-activity', $activity->id) }}">{{ $activity->title }}</a>
                                    </h3>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No Activities found.</p>
                @endif
            </div>
        </div>
    </div>

    @include('User.action')

    @include('User.footer')
    @include('User.copywrite')
    @include('User.script')
</body>
</html>
