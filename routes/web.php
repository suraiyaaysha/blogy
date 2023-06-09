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

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CmsController;

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

// This Route is only for Default User Login
Route::get('/dashboard', [HomeController::class, 'authRedirect'])->middleware('auth')->name('home');


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

// Get Featured Category
Route::get('/', [FrontendController::class, 'featuredCategory']);

// Get Recent and Latest Posts
Route::get('/', [FrontendController::class, 'latestPost']);

// Get Featured Posts
Route::get('/', [FrontendController::class, 'featuredPosts']);


// Frontend CMS Related Route
Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');

// Home Banner Slider
Route::get('/', [FrontendController::class, 'postSlider']);


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


// Route::get('posts/show/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
Route::post('comments/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
// Comment App url

// Tags Route
Route::get('/posts', [FrontendController::class, 'allTags'])->name('posts.index');
Route::get('/tags/{slug}', [FrontendController::class, 'showTag'])->name('tags.index');

// Social Share
Route::get('/posts/{post_slug}', [SocialShareController::class, 'socialShare']);

// Newsletter
 Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');
    Route::get('/admin/subscriber-list', [NewsletterController::class, 'showSubscriber']);
    Route::delete('/admin/subscriber-list/{id}/delete', [NewsletterController::class, 'destroy']);
});

// Search
Route::get('/search', [FrontendController::class, 'search'])->name('search');

// filterPosts
Route::get('/posts', [FrontendController::class, 'filterPosts'])->name('posts.index');

/*
|--------------------------------------------------------------------------
| Admin Panel Routes Start
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    Route::middleware(['auth', 'admin'])->group(function () {

        // Dashboard || This Route is only for Admin Login
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

        // For Admin Dashboard
        Route::get('/dashboard', [DashboardController::class, 'showAllInformation'])->name('admin.dashboard');

        // Category Route

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

        // Settings Route
        // Route::get('settings', [SettingController::class, 'index'])->name('settings.index');

        Route::controller(CmsController::class)->group(function(){
            Route::get('settings', 'home');
            Route::put('settings', 'homeUpdate')->name('settings.homeUpdate');
        });

    });

});
