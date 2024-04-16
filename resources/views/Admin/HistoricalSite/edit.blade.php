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
                            <h6 class="mb-4">Update Historical Site</h6>
                            <form action="{{ route('update',$historicalSite->id) }}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <div class="form-wrapper">
                                        <label for="">Historical Site Name</label>
                                        <input type="text" name="history_name" class="form-control" value="{{ $historicalSite->history_name }}">
                                    </div>
                                    <div class="form-wrapper">
                                        <label for="">Price</label>
                                        <input type="text" name="price" class="form-control" value="{{ $historicalSite->price }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-wrapper">
                                        <label for="">Historical Site Image</label>
                                        @if ($historicalSite->history_image)
                                        <img src="{{ asset('storage/' . $historicalSite->history_image) }}" alt="Hotel Image" style="max-width: 150px; max-height: 40px;">
                                    @else
                                        No Image
                                    @endif
                                        <input type="file" name="history_image" class="form-control">
                                    </div>
                                    <div class="form-wrapper">
                                        <label for="">City</label>
                                        <input type="text" name="city" class="form-control" value="{{ $historicalSite->city }}">
                                    </div>
                                </div>

                                <div class="form-wrapper">
                                    <label for="">Description</label>
                                    <input type="text" name="description" class="form-control" value="{{ $historicalSite->description }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Update Historical Site</button>
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
