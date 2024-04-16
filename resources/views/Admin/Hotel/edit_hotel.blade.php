<!DOCTYPE html>
<html lang="en">
<base href="/public">
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
                            <h6 class="mb-4">Update Hotel</h6>
                            <form action="{{ route('edit',$hotel->id) }}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <div class="form-wrapper">
                                        <label for="">Hotel Name</label>
                                        <input type="text" name="hotel_name" class="form-control" value="{{ $hotel->hotel_name }}">
                                    </div>
                                    <div class="form-wrapper">
                                        <label for="">Price</label>
                                        <input type="text" name="price" class="form-control" value="{{ $hotel->price }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-wrapper">
                                        <label for="">Hotel Image</label>
                                        @if ($hotel->hotel_image)
                                        <img src="{{ asset('storage/' . $hotel->hotel_image) }}" alt="Hotel Image" style="max-width: 150px; max-height: 40px;">
                                    @else
                                        No Image
                                    @endif
                                        <input type="file" name="hotel_image" class="form-control">
                                    </div>
                                    <div class="form-wrapper">
                                        <label for="">City</label>
                                        <input type="text" name="city" class="form-control" value="{{ $hotel->city }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Description</label>
                                    <input type="text" name="description" class="form-control" value="{{ $hotel->description }}">
                                </div>
                                <div class="form-wrapper">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="" selected disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $hotel->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-wrapper">
                                    <label for="">Rate</label>
                                    <input type="text" name="rate" value="{{ $hotel->rate }}" class="form-control">
                                </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Hotel</button>
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
