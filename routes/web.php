<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\Admin\BlogController;
use App\HTTP\Controllers\Admin\TestimonialController;
use App\HTTP\Controllers\Admin\CategoryController;
use App\HTTP\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin')->name('admin.')->group(function () {

    Route ::resource('blog',BlogController::class);
    Route ::resource('testimonial',TestimonialController::class);
    Route ::resource('category',CategoryController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    

});

require __DIR__.'/auth.php';
