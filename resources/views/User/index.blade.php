<!doctype html>
<html lang="en">
@include('User.css')

<body>


	@include('User.nav')


    <div class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="intro-wrap">
                        <h1 class="mb-5"><span class="d-block">Let's Enjoy Your Trip </span> In  <span class="typed-words"></span></h1>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="slides">
                        @foreach (['zanz1.jpg', 'zanz10.jpg', 'zanz11.jpg', 'zanz12.jpg', 'zanz13.jpg'] as $index => $image)
                            <img src="user/images/{{ $image }}" alt="Image" class="img-fluid{{ $index == 0 ? ' active' : '' }}" data-id="{{ $index + 1 }}">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

	@include('User.service')

	@include('User.count')

    @include('User.historicalsite')

    @include('User.hotel')
	@include('User.destination')



    @include('User.special')



    @include('User.food')

    @include('User.activity')
    @include('User.action')


    @include('User.video')


    @include('User.footer')

    @include('User.copywrite')
    <!-- Scripts -->


    @include('User.script')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js"></script>
<script>
    $(function() {
        var slides = $('.slides'),
            images = slides.find('img'),
            typedWords = $(".typed-words"),
            imageCount = images.length;

        images.each(function(index) {
            $(this).attr('data-id', index + 1);
        });

        var typed = new Typed(typedWords[0], {
            strings: ["Unguja.", " Pemba.", " Kisiwani.", " Zanzibar.", " Zanzibar."],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true,
            preStringTyped: function(arrayPos) {
                var activeImage = $('.slides img.active');
                activeImage.removeClass('active');
                var nextImageIndex = (arrayPos % imageCount) + 1;
                $('.slides img[data-id="' + nextImageIndex + '"]').addClass('active');
            }
        });
    });
</script>







</body>

</html>
