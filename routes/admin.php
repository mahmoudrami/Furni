<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TestimonialController;

Route::prefix('admin')->name('admin.')->group(function () {

    require __DIR__ . '/Adminauth.php';

    Route::middleware(['admin'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/edit-profile', [AdminController::class, 'profile'])->name('profile');
        Route::put('/edit-profile', [AdminController::class, 'editProfile'])->name('editProfile');
        Route::post('/edit-checkPassword', [AdminController::class, 'checkPassword'])->name('checkPassword');

        Route::get('/setting', [AdminController::class, 'setting'])->name('setting');
        Route::put('/update_settings', [AdminController::class, 'update_settings'])->name('update_settings');

        Route::resource('Product', ProductController::class);
        Route::resource('Service', ServiceController::class);
        Route::resource('Post', PostController::class);
        Route::resource('Member', MemberController::class);
        Route::resource('Testimonial', TestimonialController::class);
        Route::resource('Coupon', CouponController::class);
    });
});
