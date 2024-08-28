<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;

Route::prefix('admin')->name('admin.')->group(function(){

    require __DIR__.'/Adminauth.php';

    Route::middleware(['admin'])->group(function(){
        Route::get('/', [AdminController::class, 'index'])->name('index');


        Route::resource('Product', ProductController::class);
        Route::resource('Service', ServiceController::class);
    });


});
