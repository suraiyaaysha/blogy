<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SocialShareController;
use App\Http\Controllers\NewsletterController;

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
Route::get('/', [FrontendController::class, 'index'])->name('home');
// Route::get('/', function () {
//     return view('frontend.home');
// });

// Get Featured Category
Route::get('/', [FrontendController::class, 'featuredCategory']);

// Get Recent and Latest Posts
Route::get('/', [FrontendController::class, 'latestPost']);

// Get Featured Posts
Route::get('/', [FrontendController::class, 'featuredPosts']);

// Only Posts Page
Route::get('/posts', [FrontendController::class, 'allPosts'])->name('posts.index');
// Route::get('/posts/{post_slug}', [FrontendController::class, 'postDetails']);
Route::get('/posts/{post_slug}', [FrontendController::class, 'postDetails'])->name('posts.postDetails');
// Only Posts Page


// For Category, Categories posts
Route::get('/categories', [FrontendController::class, 'allCategory'])->name('categories.allCategory');
Route::get('/categories/{category_slug}', [FrontendController::class, 'category'])->name('categories.category');
// Route::get('/categories/{category_slug}/{post_slug}', [FrontendController::class, 'post']);
Route::get('/categories/{category_slug}/{post_slug}', [FrontendController::class, 'post']);

// Posts Like/Unlike Route
Route::post('/posts/{post}/like', [FrontendController::class, 'like'])->name('posts.like');
Route::delete('/posts/{post}/unlike', [FrontendController::class, 'unlike'])->name('posts.unlike');


// Comment App url
// Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
// Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
// Route::post('posts/store', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');

// Route::get('posts/show/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
// Route::post('comments/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');



// Route::get('posts/show/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
Route::post('comments/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
// Comment App url

// Tags Route
Route::get('/posts', [FrontendController::class, 'allTags'])->name('posts.index');
Route::get('/tags/{slug}', [FrontendController::class, 'showTag'])->name('tags.index');

// Social Share
Route::get('/posts/{post_slug}', [SocialShareController::class, 'socialShare']);

// Newsletter
Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');
Route::get('/admin/subscriber-list', [NewsletterController::class, 'showSubscriber']);
Route::delete('/admin/subscriber-list/{id}/delete', [NewsletterController::class, 'destroy']);

// Search
Route::get('/search', [FrontendController::class, 'search'])->name('search');

/*
|-----------------------------
| Category, Post, Category wise posts
|--------------------------------------------------------------------------
*/

// Route::get('/collections', [FrontendController::class, 'index']);
// Route::get('/collections/{category_slug}', [FrontendController::class, 'category']);
// Route::get('/collections/{category_slug}/{post_slug}', [FrontendController::class, 'post']);


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

    // Route::middleware('auth')->group(function () {
    Route::middleware(['auth', 'admin'])->group(function () {
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

        // Blog Post Route
        Route::controller(App\Http\Controllers\Admin\PostController::class)->group(function () {
            Route::get('posts', 'index');
            Route::get('post/create', 'create');
            // Route::post('posts', 'store');
            Route::post('posts', 'store');
            Route::get('posts/{post}/edit', 'edit');
            Route::put('posts/{post}', 'update');
            // Route::get('posts/{post_id}/delete', 'destroy');  for a tag delete
            Route::delete('posts/{post_id}/delete', 'destroy');
            Route::get('posts/{post}/show', 'show');
            Route::get('posts/{id}/show', 'show');
            // Route::get('/admin/posts/{post}/show', [PostController::class, 'show'])->name('admin.post.show');

        });

        // Tags Route
        Route::get('tag', [TagController::class, 'index'])->name('tag.index');
        Route::get('tag/create', [TagController::class, 'create'])->name('tag.create');
        Route::post('tag', [TagController::class, 'store'])->name('tag.store');
        Route::get('tag/{id}/edit', [TagController::class, 'edit'])->name('tag.edit');
        Route::put('tag/{id}/update', [TagController::class, 'update'])->name('tag.update');
        Route::delete('tag/{id}/delete', [TagController::class, 'destroy'])->name('tag.destroy');

    });

});
