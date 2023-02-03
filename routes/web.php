<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\Admin\BlogController;
use App\HTTP\Controllers\Admin\TestimonialController;
use App\HTTP\Controllers\Admin\CategoryController;
use App\HTTP\Controllers\Admin\DashboardController;
use App\HTTP\Controllers\Admin\BookController;
use App\HTTP\Controllers\Admin\SearchController;
use App\Http\Controllers\FrontBlogController;


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

Route::resource('front-blog', FrontBlogController::class);


Route::prefix('admin')->name('admin.')->group(function () {

    Route ::resource('blog',BlogController::class);
    Route ::resource('testimonial',TestimonialController::class);
    Route ::resource('category',CategoryController::class);
    Route ::resource('book',BookController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/search',[SearchController::class, 'Search'])->name('search');

});

// Route::get('search', [SearchController::class, 'index']);

// public function index(){
//     $product = 


//     redirect response json*()

// }

require __DIR__.'/auth.php';
