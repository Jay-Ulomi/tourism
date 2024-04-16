<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="user/js/jquery-3.4.1.min.js"></script>
<script src="user/js/popper.min.js"></script>
<script src="user/js/bootstrap.min.js"></script>
<script src="user/js/owl.carousel.min.js"></script>
<script src="user/js/jquery.animateNumber.min.js"></script>
<script src="user/js/jquery.waypoints.min.js"></script>
<script src="user/js/jquery.fancybox.min.js"></script>
<script src="user/js/aos.js"></script>
<script src="user/js/moment.min.js"></script>
<script src="user/js/daterangepicker.js"></script>
<script src="use/js/typed.js"></script>



<script src="user/js/custom.js"></script>



<!-- Initialize Swiper -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var mySwiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 0,
            autoplay: {
                delay: 5000, // Set the delay between slides in milliseconds (e.g., 5000ms = 5 seconds)
            },
            loop: true, // Enable looping
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });
</script>

<script>
    $(document).ready(function(){
    $('#image-carousel').owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        dots: false,
        nav: true
    });
    $('#text-carousel').owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        dots: false,
        nav: true
    });
});

</script>

