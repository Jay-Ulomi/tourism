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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-vyj5p+H2uQp84NJrTExym9WxWlXjz49e/RVRb3cf6pXMqvN7+V2OMb1+NOgWzvTL" crossorigin="anonymous"></script>


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

