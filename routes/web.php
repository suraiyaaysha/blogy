<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;

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



Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
// Route::get('/post', [HomeController::class, 'post'])->middleware(['auth', 'admin'])->name('post');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Frontend Routes Start
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('frontend.home');
});


/*
|--------------------------------------------------------------------------
| Admin Panel Routes Start
|--------------------------------------------------------------------------
*/
// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'admin'])->name('dashboard');

// Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware('auth')->name('admin.dashboard');

Route::prefix('admin')->group(function () {

    Route::middleware('auth')->group(function () {
        // Dashboard
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

        // Category Route

        // Route::controller(App\Http\Controllers\CategoryController::class)->group(function () {
        //     Route::get('category', 'index');
        // });

        Route::get('category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
        // Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::post('category', [CategoryController::class, 'store'])->name('category.store');
        Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('category/{id}/delete', [CategoryController::class, 'destroy'])->name('category.destroy');

        // Blog Route
        Route::controller(App\Http\Controllers\Admin\PostController::class)->group(function () {
            Route::get('posts', 'index');
            Route::get('posts/create', 'create');
            Route::post('posts', 'store');
            Route::get('posts/{post}/edit', 'edit');
            Route::get('posts/{post}', 'update');
        });
    });

});
