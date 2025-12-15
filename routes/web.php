<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Category;
use App\Models\Post;


Route::get('/', [HomeController::class, 'index'])->name('home');

// Public posts
Route::get('/posts', [PostController::class,'index'])->name('posts.index');
Route::get('/posts/{slug}', [PostController::class,'show'])->name('posts.show');
Route::get('/category/{slug}', [PostController::class,'category'])->name('categories.show');

// Auth (custom)
Route::get('register', [AuthController::class,'showRegister'])->name('register');
Route::post('register', [AuthController::class,'register'])->name('register.post');
Route::get('login', [AuthController::class,'showLogin'])->name('login');
Route::post('login', [AuthController::class,'login'])->name('login.post');
Route::post('logout', [AuthController::class,'logout'])->name('logout');

// Admin routes
Route::prefix('admin')->middleware(['auth', AdminMiddleware::class])->group(function(){
    Route::get('/dashboard', function(){
        $totalCategories = Category::count();
        $totalPosts = Post::count();
        return view('admin.dashboard', compact('totalCategories','totalPosts'));
    })->name('admin.dashboard');

    Route::resource('categories', AdminCategoryController::class, ['as'=>'admin']);
    Route::resource('posts', AdminPostController::class, ['as'=>'admin']);
});

