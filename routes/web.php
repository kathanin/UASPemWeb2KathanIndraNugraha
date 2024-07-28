<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/', [PostController::class, 'index']);

// Route untuk reource posts
Route::resource('/posts', PostController::class);

// Route untuk halaman statis
// Route::get('/view/{code}', [PostController::class, 'view'])->name('posts.view');
// Route::get('/add', [PostController::class, 'add'])->name('posts.add');
// Route::get('/edit/{code}', [PostController::class, 'edit'])->name('posts.edit');
// Route::get('/login', [PostController::class, 'login'])->name('posts.login');
// Route::get('/pdf', [PostController::class, 'generatePDF'])->name('posts.pdf');
// 

    Route::middleware('auth')->group (function () {
    Route::get("/", [PostController::class, "index"])->name("home");
    Route::get("/home", [PostController::class, "index"])->name("home");
    Route::post("/logout", [ProfileController::class, "logout"])->name("logout");
    Route::resource('/posts', PostController::class);
    Route::get('/view/{code}', [PostController::class, 'view'])->name('posts.view');
    Route::get('/add', [PostController::class, 'add'])->name('posts.add'); Route::get('/edit/{code}', [
    PostController::class, 'edit'])->name('posts.edit'); Route::get('/login', [PostController::class, 'login'])->name('posts.login');
    Route::get('/pdf', [PostController::class, 'generatePDF'])->name('posts.pdf');
    });

    Route::middleware('guest')->group (function () {
    Route::get('/register', [ProfileController::class, 'registerForm'])->name("profile.register");
    Route::post('/register', [ProfileController::class, 'register'])->name("profile.register");
    Route::get('/login', [ProfileController::class, 'loginForm'])->name("login");
    Route::post('/login', [ProfileController::class, 'login'])->name("login");
    });