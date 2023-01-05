<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/', [App\Http\Controllers\FrontEndController::class, 'index'])->name('/');
Route::get('/tentang', [App\Http\Controllers\FrontEndController::class, 'tentang'])->name('tentang');
Route::get('/berita', [App\Http\Controllers\FrontEndController::class, 'berita'])->name('berita');
Route::get('/berita/{id}', [App\Http\Controllers\FrontEndController::class, 'beritaView'])->name('beritaView');

Route::get('/produk', [App\Http\Controllers\FrontEndController::class, 'produk'])->name('produk');

Route::post('/add-comment', [App\Http\Controllers\FrontEndController::class, 'addComment'])->name('addComment');
Route::post('/add-pengaduan', [App\Http\Controllers\FrontEndController::class, 'addPengaduan'])->name('addPengaduan');

Route::get('/vidio', [App\Http\Controllers\FrontEndController::class, 'vidio'])->name('vidio');
Route::get('/galleri', [App\Http\Controllers\FrontEndController::class, 'galleri'])->name('galleri');
Route::get('/pengaduan', [App\Http\Controllers\FrontEndController::class, 'pengaduan'])->name('pengaduan');
Route::get('/kontak', [App\Http\Controllers\FrontEndController::class, 'kontak'])->name('kontak');
Route::get('/login', [App\Http\Controllers\FrontEndController::class, 'login'])->name('login');


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('/users/me', [App\Http\Controllers\UserController::class, 'me'])->name('users.me');
    Route::get('/users/data', [App\Http\Controllers\UserController::class, 'data'])->name('users.data');
    Route::post('/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::post('/users/update/{id?}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::post('/users/destroy/{id?}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees');
    Route::get('/employees/data', [App\Http\Controllers\EmployeeController::class, 'data'])->name('employees.data');
    Route::post('/employees/store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employees.store');
    Route::post('/employees/update/{id?}', [App\Http\Controllers\EmployeeController::class, 'update'])->name('employees.update');
    Route::post('/employees/destroy/{id?}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employees.destroy');

    
    Route::get('/news-category', [App\Http\Controllers\NewsCategoryController::class, 'index'])->name('news-category');
    Route::get('/news-category/data', [App\Http\Controllers\NewsCategoryController::class, 'data'])->name('news-category.data');
    Route::post('/news-category/store', [App\Http\Controllers\NewsCategoryController::class, 'store'])->name('news-category.store');
    Route::post('/news-category/update/{id?}', [App\Http\Controllers\NewsCategoryController::class, 'update'])->name('news-category.update');
    Route::post('/news-category/destroy/{id?}', [App\Http\Controllers\NewsCategoryController::class, 'destroy'])->name('news-category.destroy');

    Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news');
    Route::get('/news/data', [App\Http\Controllers\NewsController::class, 'data'])->name('news.data');
    Route::post('/news/store', [App\Http\Controllers\NewsController::class, 'store'])->name('news.store');
    Route::post('/news/update/{id?}', [App\Http\Controllers\NewsController::class, 'update'])->name('news.update');
    Route::post('/news/destroy/{id?}', [App\Http\Controllers\NewsController::class, 'destroy'])->name('news.destroy');

    Route::get('/vidio-activity', [App\Http\Controllers\VidioActivityController::class, 'index'])->name('vidio-activity');
    Route::get('/vidio-activity/data', [App\Http\Controllers\VidioActivityController::class, 'data'])->name('vidio-activity.data');
    Route::post('/vidio-activity/store', [App\Http\Controllers\VidioActivityController::class, 'store'])->name('vidio-activity.store');
    Route::post('/vidio-activity/update/{id?}', [App\Http\Controllers\VidioActivityController::class, 'update'])->name('vidio-activity.update');
    Route::post('/vidio-activity/destroy/{id?}', [App\Http\Controllers\VidioActivityController::class, 'destroy'])->name('vidio-activity.destroy');

    Route::get('/product-umkm', [App\Http\Controllers\ProductUmkmController::class, 'index'])->name('product-umkm');
    Route::get('/product-umkm/data', [App\Http\Controllers\ProductUmkmController::class, 'data'])->name('product-umkm.data');
    Route::post('/product-umkm/store', [App\Http\Controllers\ProductUmkmController::class, 'store'])->name('product-umkm.store');
    Route::post('/product-umkm/update/{id?}', [App\Http\Controllers\ProductUmkmController::class, 'update'])->name('product-umkm.update');
    Route::post('/product-umkm/destroy/{id?}', [App\Http\Controllers\ProductUmkmController::class, 'destroy'])->name('product-umkm.destroy');

    Route::get('/complaint', [App\Http\Controllers\ComplaintController::class, 'index'])->name('complaint');
    Route::get('/complaint/data', [App\Http\Controllers\ComplaintController::class, 'data'])->name('complaint.data');
    Route::post('/complaint/store', [App\Http\Controllers\ComplaintController::class, 'store'])->name('complaint.store');
    Route::post('/complaint/update/{id?}', [App\Http\Controllers\ComplaintController::class, 'update'])->name('complaint.update');
    Route::post('/complaint/destroy/{id?}', [App\Http\Controllers\ComplaintController::class, 'destroy'])->name('complaint.destroy');

    Route::get('/comment', [App\Http\Controllers\CommentController::class, 'index'])->name('comment');
    Route::get('/comment/data', [App\Http\Controllers\CommentController::class, 'data'])->name('comment.data');
    Route::post('/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');
    Route::post('/comment/update/{id?}', [App\Http\Controllers\CommentController::class, 'update'])->name('comment.update');
    Route::post('/comment/destroy/{id?}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comment.destroy');

    Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');
    Route::get('/gallery/data', [App\Http\Controllers\GalleryController::class, 'data'])->name('gallery.data');
    Route::post('/gallery/store', [App\Http\Controllers\GalleryController::class, 'store'])->name('gallery.store');
    Route::post('/gallery/update/{id?}', [App\Http\Controllers\GalleryController::class, 'update'])->name('gallery.update');
    Route::post('/gallery/destroy/{id?}', [App\Http\Controllers\GalleryController::class, 'destroy'])->name('gallery.destroy');

});
