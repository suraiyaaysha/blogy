<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Post;

use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    // Show All Category
    public function index() {
        // get featured category
        $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();


        $categories = Category::all();
        // return view('frontend.categories', compact('categories'));
        return view('frontend.categories.index', compact('categories', 'featuredCategories'));
    }

    // Show Posts under a single category
    public function category($category_slug) {

        $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();


        $category = Category::where('slug', $category_slug)->first();
        // return view('frontend.posts', compact('category', 'featuredCategories'));
        return view('frontend.categories.category-posts', compact('category', 'featuredCategories'));
    }

    // Post Details page for Showing post details together category_slug and post_slug Start
    public function post(string $category_slug, string $post_slug) {

        $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();


        $category = Category::where('slug', $category_slug)->first();
        $post = $category->posts()->where('slug', $post_slug)->first();


        // Get related posts
        $relatedPosts = $post->category->posts()->where('id', '!=', $post->id)->take(2)->get();

        // return view('frontend.post-view', compact('post'));
        return view('frontend.posts.post-details', compact('post', 'relatedPosts', 'category', 'featuredCategories'));
    }
    // Post Details page for Showing post details together category_slug and post_slug End

    // Show only is_featured category start
    public function featuredCategory(){
        $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();
        return view('frontend.home', ['categories' => $featuredCategories, 'featuredCategories' => $featuredCategories]);
    }
    // Show only is_featured category end

    // Show Posts to Home Page Start
    public function latestPost() {

        $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();

        // Show all posts to home page
        $allPosts = Post::latest()->take(3)->get();

        // Show Featured Post based on post views
        $featuredPost = Post::orderBy('views', 'desc')->take(2)->get();



        // Get the Recent 3 posts
        $recentPosts = Post::latest()->take(3)->get();

        // Get the latest 6 posts
        $latestPosts = Post::latest()->take(6)->get();

        // Pass the posts to the home view
        return view('frontend.home', compact('latestPosts', 'recentPosts', 'featuredPost', 'allPosts' ,'featuredCategories'));
    }
    // Show Posts to Home Page End

    // Show All Posts to Posts Page Start
    public function allPosts() {
        $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();


        $allPosts = Post::latest()->paginate(4);
        return view('frontend.posts.index', compact('allPosts', 'featuredCategories'));
    }
    // Show All Posts to Posts Page End

    // Show Categories Post Details | Post Details page for showing Post Details via post_slug Start
    public function postDetails(string $post_slug) {

        $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();


        // $category = Category::where('slug', $category_slug)->first();
        $post = Post::where('slug', $post_slug)->first();


        // Get related posts
        $relatedPosts = $post->category->posts()->where('id', '!=', $post->id)->take(2)->get();


        return view('frontend.posts.post-details', compact('post', 'relatedPosts', 'featuredCategories'));
    }
    // Post Details page End

}
