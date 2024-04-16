<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\HistoricalSiteController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryOfferController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanbookingController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileImageController;

    // Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/',[HomeController::class,'Home'])->name('index');
    Route::get('/about',[HomeController::class,'about'])->name('about');
    Route::get('/contact',[HomeController::class,'contact'])->name('contact');

    Route:: get('/register',[RegistrationController::class,'register'])->name('register');
    Route:: post('/userregistration',[RegistrationController::class,'registration'])->name('userregistration');

    Route::get('/login',[LoginController::class,'login'])->name('login');
    Route::post('/userlogin',[LoginController::class,'authenticated'])->name('userlogin');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/hotels', [HotelController::class, 'hotelindex'])->name('customer-hotels');
    Route::get('/Show-Hotels/{id}', [HotelController::class, 'show'])->name('ShowHotel');

    Route::get('/restaurants', [RestaurantController::class, 'viewRestaurants'])->name('view-restaurants');
    Route::get('/view-restaurants/{id}', [RestaurantController::class, 'show'])->name('ShowRestaurant');

    Route::get('/historical-sites', [HistoricalSiteController::class, 'HistoricalSites'])->name('historical-sites');
    Route::get('/historical-sites/{id}', [HistoricalSiteController::class, 'show']);

    Route::get('/galleries', [GalleryController::class, 'index']);
    Route::get('/galleries/{id}', [GalleryController::class, 'show']);

    Route::get('/offers', [OffersController::class, 'index']);
    Route::get('/offers/{id}', [OffersController::class, 'show']);

    Route::get('/destinations', [DestinationController::class, 'viewDestination'])->name('destinations');
    Route::get('/destinations/{id}', [DestinationController::class, 'show']);

    Route::get('/view-bookingplan',[BookingController::class,'viewPlan'])->name('view-bookingplan');

    Route::get('/Info-Historical-Site/{id}',[HistoricalSiteController::class , "showDetails"]) -> name("history");





// Routes accessible to customers (apply 'customer' middleware)
Route::middleware(['checkRole:customer'])->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('index', [HomeController::class, 'Home'])->name('userdashboard');
        Route::get('/user-bookings/{id}', [BookingController::class, 'index'])->name('user-bookings');
        Route::get('/info-plan', [BookingController::class, 'info_plan'])->name('info-plan');
        Route::get('/getHotelNames', [BookingController::class, 'getHotelNames'])->name('getHotelNames');
        Route::post('/store_info', [BookingController::class, 'store_customer'])->name('store_info');
        Route::get('/payment/{id}', [BookingController::class, 'payment'])->name('payment');
        Route::get('/getcheckout', [BookingController::class, 'getcheckout'])->name('getcheckout');
        Route::post('/checkout', [BookingController::class, 'checkout'])->name('checkout');
        Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
        Route::post('/user_bookings/{userId}/{id}', [BookingController::class, 'store'])->name('hotel-booking');
        Route::get('/user/bookings/{id}', [BookingController::class, 'show']);
        Route::put('/user/bookings/{id}', [BookingController::class, 'update']);
        Route::delete('/user/bookings/{id}', [BookingController::class, 'destroy']);


        Route::post('/uploadimage',[ProfileImageController::class,'upload'])->name( 'upload-image' );
        Route::get('/get-image', [ProfileImageController::class, 'getImage'])->name('get-image');



        Route::post('/planstore/{planId}', [PlanbookingController::class, 'Planstore'])->name('planstore');
        Route::put('editBooking/{id}', [PlanbookingController::class, 'EditDay'])->name('editBooking');
        Route::delete('/deleteBooking/{id}', [PlanbookingController::class, 'destroy'])->name('deleteBooking' );

        Route::get('/Info-Historical-Site/{id}',[HistoricalSiteController::class , "showDetails"]) -> name("history");

    });

});


// Routes accessible to admins (apply 'admin' middleware)
Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('dashboard',([HomeController::class,'admindashboard']))->name('admindashboard');
    Route::get('users', [UserController::class, 'showall'])->name('view_users');
    Route::get('add_user', [UserController::class, 'create'])->name('add_user');
    Route::post('adduser', [UserController::class, 'store'])->name('adduser');
    Route::get('/admin/users/{id}', [UserController::class, 'show']);
    Route::put('/admin/users/{id}', [UserController::class, 'update']);
    Route::delete('delete_user/{id}', [UserController::class, 'destroy'])->name('delete_user');

    Route::get('addhotel', [HotelController::class, 'index'])->name('addhotel');
    Route::post('add_hotel', [HotelController::class, 'store'])->name('add_hotel');
    Route::get('view_hotel',[ HotelController::class,'showHotel'])->name('view_hotel');
    Route::get('/admin/hotels/{id}', [HotelController::class, 'show']);
    Route::get('admin.edit/{id}',[HotelController::class,'edit'])->name('admin.edit');
    Route::put('hotels/{id}', [HotelController::class, 'update'])->name('edit');
    Route::delete('delete_hotel/{id}', [HotelController::class, 'destroy'])->name('delete_hotel');
    Route::get('/hotelBooking',[HotelController::class, 'hotelBooking'])->name('hotelBooking');

    Route::get('add_restaurants', [RestaurantController::class, 'index'])->name('addretaurant');
    Route::post('admin_restaurants', [RestaurantController::class, 'store'])->name('add_restaurant');
    Route::get('/view_restaurants', [RestaurantController::class, 'showRestaurant'])->name('view_restaurant');
    Route::get('/admin/restaurants/{id}', [RestaurantController::class, 'show']);
    Route::get('/edit-admin-restaurant/{id}',[RestaurantController::class,'edit'])->name('edit-admin-restaurant');
    Route::put('/update-admin-restaurants/{id}', [RestaurantController::class, 'update'])->name('update-admin-restaurants');
    Route::delete('/delete_restaurant/{id}', [RestaurantController::class, 'destroy'])->name('delete_restaurant');

    Route::get('/addhistory', [HistoricalSiteController::class, 'index'])->name('addhistory');
    Route::post('/add_history', [HistoricalSiteController::class, 'store'])->name('add_history');
    Route::get('/view_historicalsite',[HistoricalSiteController::class,'showHistory'])->name('view_historicalsite');
    Route::get('/admin/historical-sites/{id}', [HistoricalSiteController::class, 'show']);
    Route::get('edit/{id}',[HistoricalSiteController::class,'edit'])->name('edit');
    Route::put('/update-historical-sites/{id}', [HistoricalSiteController::class, 'update'])->name('update');
    Route::delete('/delete_history/{id}', [HistoricalSiteController::class, 'destroy'])->name('delete_history');

    Route::get('/admin-galleries', [GalleryController::class, 'index'])->name('addgallery');
    Route::post('/add_galleries', [GalleryController::class, 'store'])->name('add_gallery');
    Route::get('/view-gallery',[GalleryController::class,'showGallery'])->name('view-gallery');
    Route::get('/admin/galleries/{id}', [GalleryController::class, 'show']);
    Route::get('/edit/{id}',[GalleryController::class,'edit'])->name('edit_gallery');
    Route::put('/update-galleries/{id}', [GalleryController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [GalleryController::class, 'destroy'])->name('delete');

    Route::get('/add-admin-offers', [OffersController::class, 'index'])->name('add-admin-offers');
    Route::post('/add-offers', [OffersController::class, 'store'])->name('add-offers');
    Route::get('/view-offer',[OffersController::class,'showOffer'])->name('view-offer');
    Route::get('/admin/offers/{id}', [OffersController::class, 'show']);
    Route::get('/admin-offers/{id}', [OffersController::class, 'edit'])->name('edit-offer');
    Route::put('/update-admin-offers/{id}', [OffersController::class, 'update'])->name('update-admin-offers');
    Route::delete('/delete-admin-offers/{id}', [OffersController::class, 'destroy'])->name('delete-admin-offers');

    Route::get('/add-admin-destinations', [DestinationController::class, 'index'])->name('add-admin-destinations');
    Route::post('/add-destinations', [DestinationController::class, 'store'])->name('add-destinations');
    Route::get('/view-admin-destination',[DestinationController::class,'showDestination'])->name('view-admin-destination');
    Route::get('/admin/destinations/{id}', [DestinationController::class, 'show']);
    Route::get('/edit-admin-destination/{id}',[DestinationController::class,'edit'])->name('edit-admin-destination');
    Route::put('/update-admin-destinations/{id}', [DestinationController::class, 'update'])->name('update-admin-destinations');
    Route::delete('/delete-admin-destination/{id}', [DestinationController::class, 'destroy'])->name('delete-admin-destination');

    Route::get('/add-categories', [CategoryController::class, 'index'])->name('add-categories');
    Route::post('/add-admin-categories', [CategoryController::class, 'store'])->name('add-admin-categories');
    Route::get('/view-admin-categories', [CategoryController::class, 'showCategory'])->name('view-admin-categories');
    Route::get('/admin/categories/{id}', [CategoryController::class, 'show']);
    Route::get('/admin-edit/{id}',[CategoryController::class,'edit'])->name('admin-edit');
    Route::put('/update-admin-categories/{id}', [CategoryController::class, 'update'])->name('update-admin-categories');
    Route::delete('/delete-admin-categories/{id}', [CategoryController::class, 'destroy'])->name('delete-admin-categories');

    Route::get('/admin/bookings', [BookingController::class, 'index']);
    Route::post('/admin/bookings', [BookingController::class, 'store']);
    Route::get('/admin/bookings/{id}', [BookingController::class, 'show']);
    Route::put('/admin/bookings/{id}', [BookingController::class, 'update']);
    Route::delete('/admin/bookings/{id}', [BookingController::class, 'destroy']);

    Route::get('/admin/category-offers', [CategoryOfferController::class, 'index']);
    Route::post('/admin/category-offers', [CategoryOfferController::class, 'store']);
    Route::get('/admin/category-offers/{id}', [CategoryOfferController::class, 'show']);
    Route::put('/admin/category-offers/{id}', [CategoryOfferController::class, 'update']);
    Route::delete('/admin/category-offers/{id}', [CategoryOfferController::class, 'destroy']);
    // Add more admin-specific routes here

    Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('/plans', [PlanController::class, 'create'])->name('plans.create');
    Route::post('/add-plans', [PlanController::class, 'store'])->name('plans.store');
    Route::get('/plans/{id}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::put('/plans/{id}', [PlanController::class, 'update'])->name('plans.update');
    Route::delete('/plans/{id}', [PlanController::class, 'destroy'])->name('plans.destroy');


    Route::get('/planBooking',[PlanbookingController::class,'planBooking'])->name( 'planBooking' );
});
