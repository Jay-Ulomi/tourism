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

             <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add User</h6>
                            <form action="{{ route('adduser') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="form-wrapper">
                                        <label for="">First Name</label>
                                        <input type="text" name="first_name" class="form-control">
                                    </div>
                                    <div class="form-wrapper">
                                        <label for="">Last Name</label>
                                        <input type="text" name="last_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-wrapper">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="form-wrapper">
                                        <label for="">Age</label>
                                        <input type="text" name="age" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-wrapper">
                                        <label for="">Nationality</label>
                                        <input type="text" name="nationality" class="form-control">
                                    </div>
                                    <div class="form-wrapper">
                                        <label for="">City</label>
                                        <input type="text" name="city" class="form-control">
                                    </div>
                                </div>

                                <div class="form-wrapper">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Add User</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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
