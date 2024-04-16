<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>ADMIN</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="admin/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ $user->last_name }}</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('admindashboard') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-2"></i>User</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('add_user') }}" class="dropdown-item">
                        <i class="fa fa-plus-circle me-2"></i>Add User</a>
                    <a href="{{ route("view_users") }}" class="dropdown-item"><i class="fa fa-eye me-2"></i>View User</a>

                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-bed me-2"></i>Hotel</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('addhotel') }}" class="dropdown-item">
                        <i class="fa fa-plus-circle me-2"></i>Add Hotel</a>
                    <a href="signup.html" class="dropdown-item">
                        {{-- <i class="fa fa-pencil-squre"></i></i>Edit Hotel</a> --}}
                    <a href="{{ route('view_hotel') }}" class="dropdown-item"><i class="fa fa-eye me-2"></i>View Hotels</a>

                </div>
            </div>


            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-utensils"></i>

                   Restaurant</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('addretaurant') }}" class="dropdown-item">
                        <i class="fa fa-plus-circle me-2"></i>Add Restaurant</a>

                    <a href="{{ route('view_restaurant') }}" class="dropdown-item">
                        <i class="fa fa-eye me-2" ></i>View Restaurants</a>

                </div>
            </div>


            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-history me-2"></i>Historical Site</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('addhistory') }}" class="dropdown-item">
                        <i class="fa fa-plus-circle me-2"></i>  Add Historical Site</a>
                    <a href="{{ route('view_historicalsite') }}" class="dropdown-item">
                        <i class="fa fa-eye me-2" ></i>View Historical Site</a>

                </div>
            </div>


            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-camera-retro me-2"></i>Gallery</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('addgallery') }}" class="dropdown-item">
                        <i class="fa fa-plus-circle me-2"></i>  Add Gallery</a>
                    <a href="{{ route('view-gallery') }}" class="dropdown-item">
                        <i class="fa fa-eye me-2" ></i>View Gallery</a>

                </div>
            </div>


            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-pencil-square-o me-2"></i>Category</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('add-categories') }}" class="dropdown-item">
                        <i class="fa fa-plus-circle me-2"></i>  Add Category </a>
                    <a href="{{ route('view-admin-categories') }}" class="dropdown-item">
                        <i class="fa fa-eye me-2" ></i>View Category </a>
                </div>
            </div>


            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-history me-2"></i>Offer</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('add-admin-offers') }}" class="dropdown-item">
                        <i class="fa fa-plus-circle me-2"></i>  Add Offer </a>
                    <a href="{{ route('view-offer') }}" class="dropdown-item">
                        <i class="fa fa-eye me-2" ></i>View Offer </a>

                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-map-marker me-2"></i>Destination</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('add-admin-destinations') }}" class="dropdown-item">
                        <i class="fa fa-plus-circle me-2"></i>  Add Destination </a>
                    <a href="{{ route('view-admin-destination') }}" class="dropdown-item">
                        <i class="fa fa-eye me-2" ></i>View Destination </a>

                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-map-marker me-2"></i>Plan</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('plans.create') }}" class="dropdown-item">
                        <i class="fa fa-plus-circle me-2"></i>  Add Plan </a>
                    <a href="{{ route('view-admin-destination') }}" class="dropdown-item">
                        <i class="fa fa-eye me-2" ></i>View Plan </a>

                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-book me-2"></i>Booking</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('planBooking') }}" class="dropdown-item">
                        <i class="fa fa-eye me-2" ></i>Planning Booking </a>
                    <a href="{{ route('hotelBooking') }}" class="dropdown-item">
                        <i class="fa fa-eye me-2" ></i>Hotel Booking </a>

                </div>
            </div>



            </div>
        </div>
    </nav>
</div>
