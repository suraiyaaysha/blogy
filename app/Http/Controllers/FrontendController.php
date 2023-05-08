<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('frontend.categories', compact('categories'));
    }

    public function category($category_slug) {
        $category = Category::where('slug', $category_slug)->first();
        return view('frontend.posts', compact('category'));
    }

    public function post(string $category_slug, string $post_slug) {
        $category = Category::where('slug', $category_slug)->first();
        $post = $category->posts()->where('slug', $post_slug)->first();
        // return view('frontend.post-view', compact('post'));
        return view('frontend.post-view', compact('post', 'category'));
    }

    // Show only is_featured category

    public function featuredCategory(){
        $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();
        return view('frontend.home', ['categories' => $featuredCategories, 'featuredCategories' => $featuredCategories]);
    }
    // Show only is_featured category
}
