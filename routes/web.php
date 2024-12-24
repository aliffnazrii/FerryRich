<?php

use App\Http\Controllers\GuidelineController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaidReviewController;
use App\Http\Controllers\ReviewSubmissionController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PaymentController;
use App\Http\Middleware\RoleMiddleware;


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/dashboard', [UserController::class, 'staffDashboard'])->name('staffDashboard');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard-cc', [UserController::class, 'contentCreatorDashboard'])->name('CCDashboard');




Route::resource('products', ProductController::class);
Route::resource('users', UserController::class);
Route::resource('reviews', PaidReviewController::class);
Route::resource('submissions', ReviewSubmissionController::class);
Route::resource('videos', VideoController::class);
Route::resource('payments', PaymentController::class);
Route::resource('guidelines', GuidelineController::class);



Route::get('/review', function () {
    return view('staff/list-cc');
});

Route::put('/update-video-status/{id}', [VideoController::class, 'updateStatus'])->name('videos.updateStatus');


//CONTENT CREATOR SIDE SECTION

Route::get('/review-list', [PaidReviewController::class, 'assignedReview'])->name('assignedReviews');
Route::get('/video-submission', [VideoController::class, 'videoList'])->name('videos.submission');
Route::get('/payment-history', [PaymentController::class, 'PaymentList'])->name('payments.history');
Route::get('/videos/stream/{id}', [VideoController::class, 'streamVideo'])->name('videos.stream');
Route::put('/videos/upload-link/{id}', [VideoController::class, 'uploadLink'])->name('videos.uploadLink');
Route::put('/review/update-order-status/{id}', [PaidReviewController::class, 'updateOrderStatus'])->name('reviews.updateOrderStatus');

Route::get('/payment/viewReceipt/{id}', [PaymentController::class, 'viewReceipt'])->name('payments.viewReceipt');


#STAFF SIDE SECTION (CUSTOM ROUTE)

Route::get('/code-ad', [PaidReviewController::class, 'ad_code'])->name('reviews.code-ad');
Route::get('/product-guideline/{id}', [ProductController::class, 'guidelineIndex'])->name('products.guidelines');

Route::get('/profile-cc', function () {
    return view('cc/profile-cc');
});
Route::get('/task-cc', function () {
    return view('cc/task-cc');
});

Route::get('/guidelines/manage/{id}', [GuidelineController::class, 'view'])->name('guideline.manage');
Route::get('/guidelines/view/{id}', [GuidelineController::class, 'viewGuideline'])->name('guideline.view');



#NOT USED ROUTES

Route::get('/testing', function () {
    return view('staff/testing
    ');
});
// Route::get('/list-cc', function () {
//     return view('staff/list-cc');
// });
// Route::get('/list-product', function () {
//     return view('staff/product');
// });
// Route::get('/profile', function () {
//     return view('staff/profile');
// });

// Route::get('/dashboard-cc', function () {
//     return view('cc/dashboard-cc');
// });