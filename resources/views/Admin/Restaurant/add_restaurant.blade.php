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
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
             <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Restaurant</h6>
                            <form action="{{ route('add_restaurant') }}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="form-wrapper">
                                        <label for="">Restraurant Name</label>
                                        <input type="text" name="restaurant_name" class="form-control">
                                    </div>
                                    <div class="form-wrapper">
                                        <label for="">City</label>
                                        <input type="text" name="city" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-wrapper">
                                        <label for="">Restaurant Image</label>
                                        <input type="file" name="restaurant_image" class="form-control">
                                    </div>
                                    <div class="form-wrapper">
                                        <label for="">Restaurant Image</label>
                                        <input type="file" name="image2" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-wrapper">
                                        <label for="">Restaurant Image</label>
                                        <input type="file" name="image3" class="form-control">
                                    </div>
                                    <div class="form-wrapper">
                                        <label for="">Restaurant Image</label>
                                        <input type="file" name="image4" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Description</label>
                                    <input type="text" name="description" class="form-control">
                                </div>
                                <div class="form-wrapper">
                                    <label for="category_id">Category:</label>
                                    <select name="category_id" class="form-control">
                                        <option value="" selected disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                                {{-- <div class="form-group">
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
                                </div> --}}
                                <button type="submit" class="btn btn-primary">Add Restaurant</button>
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
