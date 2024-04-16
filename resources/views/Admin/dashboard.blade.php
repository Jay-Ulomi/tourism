<!DOCTYPE html>
<html lang="en">

@include("Admin.css")

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->

        @include("Admin.spinner")
        <!-- Spinner End -->


        <!-- Sidebar Start -->

        @include('Admin.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->

            @include('Admin.navbar')
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
             @include('Admin.saleuser')
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            {{-- @include('Admin.chart') --}}
            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            @include("Admin.recentBooking")
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
           {{-- @include("Admin.widgets") --}}
            <!-- Widgets End -->


            <!-- Footer Start -->
            @include("Admin.footer")
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
        @include("Admin.script")
</body>

</html>
