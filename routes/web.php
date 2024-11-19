<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaidReviewController;
use App\Http\Controllers\ReviewSubmissionController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PaymentController;


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();



Route::get('/', function () {
    return view('auth.login');
});
Route::get('/dashboard', function () {
    return view('staff/dashboard');
});

// Route::get('/list-cc', function () {
//     return view('staff/list-cc');
// });
// Route::get('/list-product', function () {
//     return view('staff/product');
// });

Route::resource('products', ProductController::class);
Route::resource('users', UserController::class);
Route::resource('reviews', PaidReviewController::class);
Route::resource('submissions', ReviewSubmissionController::class);
Route::resource('videos', VideoController::class);
Route::resource('payments', PaymentController::class);


Route::get('/profile', function () {
    return view('staff/profile');
});
Route::get('/review', function () {
    return view('staff/list-review');
});


//CONTENT CREATOR SIDE SECTION

Route::get('/dashboard-cc', function () {
    return view('cc/dashboard-cc');
});
Route::get('/profile-cc', function () {
    return view('cc/profile-cc');
});
Route::get('/task-cc', function () {
    return view('cc/task-cc');
});
