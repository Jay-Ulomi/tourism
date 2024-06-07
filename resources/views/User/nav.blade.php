<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
    <div class="container">
        <div class="site-navigation">
            <a href="index.html" class="logo m-0">
                <img src="user/images/logo1.png" alt="" srcset="">
                    </a>

            <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
                <li class="active"><a href="{{ route('index') }}">Home</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('view-bookingplan') }}">Booking</a></li>
                <li class="has-children">
                    <a href="#">More</a>
                    <ul class="dropdown">
                        <li><a href="{{ route('customer-hotels') }}">Accommodation</a></li>
                        <li><a href="{{ route('view-restaurants') }}">Restaurants & Cafe</a></li>
                        <li><a href="{{ route('historical-sites') }}">Historical Site</a></li>
                        <li><a href="{{ route('destinations') }}">Destination</a></li>
                        <li><a href="#">Activities</a></li>
                        {{-- <li class="has-children">
                            <a href="#">Sub Menu</a>
                            <ul class="dropdown">
                                <li><a href="#">Sub Menu One</a></li>
                                <li><a href="#">Sub Menu Two</a></li>
                                <li><a href="#">Sub Menu Three</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Menu Three</a></li> --}}
                    </ul>
                </li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>


                <li class="dropdown">
                    <div class="person-icon">&#128100;</div>
                    <ul class="dropdown-content">
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            <li><a href="{{ route('profile') }}">View Profile</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endguest
                    </ul>
                </li>
            </ul>

             <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>
        </div>
    </div>
</nav>
