<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\FrontController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/shop', [FrontController::class, 'shop'])->name('shop');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/Services', [FrontController::class, 'Services'])->name('Services');
Route::get('/Post', [FrontController::class, 'Post'])->name('Post');
Route::get('/Contact', [FrontController::class, 'Contact'])->name('Contact');
Route::post('/Contact', [FrontController::class, 'ContactUs'])->name('ContactUs');

Route::middleware('auth')->group(function () {
    Route::get('/Cart', [FrontController::class, 'Cart'])->name('Cart');
    Route::post('/Cart/{id?}', [FrontController::class, 'addCart'])->name('addCart');
    Route::post('/addProduct/{product?}', [FrontController::class, 'addProduct'])->name('addProduct');
    Route::post('/deleteProduct/{product?}', [FrontController::class, 'deleteProduct'])->name('deleteProduct');
    Route::post('/Apply-Coupon/{id?}', [FrontController::class, 'applyCoupon'])->name('applyCoupon');
});
