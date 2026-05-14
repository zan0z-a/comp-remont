<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');

Route::middleware('auth')->group(function () {
    Route::get('/request', [RequestController::class, 'create'])->name('request.create');
    Route::post('/request', [RequestController::class, 'store'])->name('request.store');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::post('/admin/services', [AdminController::class, 'serviceStore'])->name('admin.service.store');
Route::put('/admin/services/{id}', [AdminController::class, 'serviceUpdate'])->name('admin.service.update');
Route::delete('/admin/services/{id}', [AdminController::class, 'serviceDelete'])->name('admin.service.delete');
Route::put('/admin/requests/{id}/status', [AdminController::class, 'requestStatus'])->name('admin.request.status');
Route::delete('/admin/requests/{id}', [AdminController::class, 'requestDelete'])->name('admin.request.delete');
Route::post('/admin/articles', [AdminController::class, 'articleStore'])->name('admin.article.store');
Route::post('/admin/reviews/{id}/approve', [AdminController::class, 'reviewApprove'])->name('admin.review.approve');
Route::delete('/admin/reviews/{id}', [AdminController::class, 'reviewDelete'])->name('admin.review.delete');