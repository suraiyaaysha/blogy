<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Post;
use App\Models\Tag;

class FrontendController extends Controller
{
    // To show Home Page
    public function index() {
        return view('frontend.home');
    }
    // To show Home Page

    // Show All Category
    public function allCategory() {
        // get featured category
        // $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();
        $featuredCategories = Category::where('is_featured', true)->take(4)->get();


        $categories = Category::all();
        // return view('frontend.categories', compact('categories'));
        return view('frontend.categories.index', compact('categories', 'featuredCategories'));
    }

    // Show Posts under a single category
    public function category($category_slug) {

        // $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();
        $featuredCategories = Category::where('is_featured', true)->take(4)->get();


        $category = Category::where('slug', $category_slug)->first();
        // return view('frontend.posts', compact('category', 'featuredCategories'));
        return view('frontend.categories.category-posts', compact('category', 'featuredCategories'));
    }

    // Post Details page for Showing post details together category_slug and post_slug Start
    public function post(string $category_slug, string $post_slug) {

        // $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();
        $featuredCategories = Category::where('is_featured', true)->take(4)->get();


        $category = Category::where('slug', $category_slug)->first();
        $post = $category->posts()->where('slug', $post_slug)->first();


        // Get related posts from the same category
        $relatedPosts = $post->category->posts()
            ->where('id', '!=', $post->id)
            ->take(2)
            ->get();

        // If there are no related posts from the same category, get two posts from any other category
        if ($relatedPosts->count() < 1) {
            $relatedPostsFromOtherCategories = Post::where('category_id', '!=', $post->category_id)
                ->take(2 - $relatedPosts->count())
                ->get();
            $relatedPosts = $relatedPosts->merge($relatedPostsFromOtherCategories);
        }


        // Determine the link URL for the "View All" link
        $viewAllLinkUrl = '';
        if ($post->category->posts()->count() > 1) {
            $viewAllLinkUrl = route('categories.category', $post->category->slug);
        } else {
            $viewAllLinkUrl = route('posts.index');
        }


        // return view('frontend.post-view', compact('post'));
        return view('frontend.posts.post-details', compact('post', 'viewAllLinkUrl', 'relatedPosts', 'category', 'featuredCategories'));
    }
    // Post Details page for Showing post details together category_slug and post_slug End

    // Show only is_featured category start
    public function featuredCategory(){
        // $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();
        $featuredCategories = Category::where('is_featured', true)->take(4)->get();
        return view('frontend.home', ['categories' => $featuredCategories, 'featuredCategories' => $featuredCategories]);
    }
    // Show only is_featured category end

    // Show Posts to Home Page Start
    public function latestPost() {

        // $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();
        $featuredCategories = Category::where('is_featured', true)->take(4)->get();

        // Show all posts to home page
        $allPosts = Post::latest()->take(3)->get();

        // Show Top/Trendy Post based on post views
        $topPost = Post::orderBy('views', 'desc')->take(2)->get();



        // Get the Recent 3 posts
        $recentPosts = Post::latest()->take(3)->get();


        // Pass the posts to the home view
        return view('frontend.home', compact('recentPosts', 'topPost', 'allPosts' ,'featuredCategories'));
    }
    // Show Posts to Home Page End

    // Show Featured Post into Home Page
    public function featuredPosts()
    {
        // $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();
        $featuredCategories = Category::where('is_featured', true)->take(4)->get();

        // Get the Recent 3 posts
        $recentPosts = Post::latest()->take(3)->get();

        // Show Top/Trendy Post based on post views
        $topPost = Post::orderBy('views', 'desc')->take(2)->get();

        // Show all posts to home page
        $allPosts = Post::latest()->take(3)->get();


        $featuredPosts = Post::where('is_featured', true)->take(2)->get();
        //  $featuredPosts = Post::where('is_featured', true)->orderBy('created_at', 'desc')->get();
        return view('frontend.home', compact('featuredPosts', 'featuredCategories', 'recentPosts', 'topPost', 'allPosts'));
    }
    // Show Featured Post into Home Page

    // Show All Posts to Posts Page Start
    public function allPosts() {
        // $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();
        $featuredCategories = Category::where('is_featured', true)->take(4)->get();


        $allPosts = Post::latest()->paginate(4);
        return view('frontend.posts.index', compact('allPosts', 'featuredCategories'));
    }
    // Show All Posts to Posts Page End

    // Show Categories Post Details | Post Details page for showing Post Details via post_slug Start
    public function postDetails(string $post_slug) {

        // $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();
        $featuredCategories = Category::where('is_featured', true)->take(4)->get();


        // $category = Category::where('slug', $category_slug)->first();
        $post = Post::where('slug', $post_slug)->first();

        // $comments = $post->comments()->with('user')->get();
            $category = null;

            if ($post->category) {
                $category = $post->category;
            }

        // Get related posts
        // $relatedPosts = $post->category->posts()->where('id', '!=', $post->id)->take(2)->get();

        // Get related posts from the same category
        $relatedPosts = $post->category->posts()
            ->where('id', '!=', $post->id)
            ->take(2)
            ->get();

        // If there are no related posts from the same category, get two posts from any other category
        if ($relatedPosts->count() < 1) {
            $relatedPostsFromOtherCategories = Post::where('category_id', '!=', $post->category_id)
                ->take(2 - $relatedPosts->count())
                ->get();
            $relatedPosts = $relatedPosts->merge($relatedPostsFromOtherCategories);
        }


        // Determine the link URL for the "View All" link
        $viewAllLinkUrl = '';
        if ($post->category->posts()->count() > 1) {
            $viewAllLinkUrl = route('categories.category', $post->category->slug);
        } else {
            $viewAllLinkUrl = route('posts.index');
        }

        return view('frontend.posts.post-details', compact('post', 'category', 'viewAllLinkUrl', 'relatedPosts', 'featuredCategories'));
    }
    // Post Details page End

    // Show All Posts to Posts Page Start
    public function allTags() {
        $featuredCategories = Category::where('is_featured', true)->take(4)->get();
        $allPosts = Post::latest()->paginate(4);

        $tags = Tag::all();
        return view('frontend.posts.index', compact('tags', 'featuredCategories', 'allPosts'));
    }
    // Show All Posts to Posts Page End

    public function showTag($slug){
        // $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();
        $featuredCategories = Category::where('is_featured', true)->take(4)->get();
        $tags = Tag::all();

        // To retrive tags post, first find tag, then posts under this tag
        $tag = Tag::where('slug', $slug)->first();
        $posts = $tag->posts()->orderBy('created_at', 'desc')->paginate(5);

        return view('frontend.tag.index', compact('tags', 'featuredCategories', 'posts', 'tag'));
    }

    // Like Method
    public function like(Post $post) {
        auth()->user()->likes()->create(['post_id' => $post->id]);
        return back();
    }

    // Unlike Method
    public function unlike(Post $post) {
        auth()->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }

    // Search Posts
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Store the search term in the session
        session(['searchTerm' => $search]);

        // Search in the title and body columns from the posts table
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('details', 'LIKE', "%{$search}%")
            ->paginate(4);

        // Pass the search term to the view using the `old` helper function
        $searchTerm = old('search', $search);

        // Return the search view with the results and search term compacted
        return view('frontend.search', compact('posts', 'searchTerm'));
    }

    // Filter Posts Start
    // public function filterPosts(Request $request)
    // {
    //     $allPosts = Post::latest()->paginate(4);
    //     $featuredCategories = Category::where('is_featured', true)->take(4)->get();

    //     $tags = Tag::all();

    //     $category = $request->get('category');
    //     $isFeatured = $request->get('is_featured');
    //     $tag = $request->get('tag'); // Retrieve the tag parameter from the request

    //     $categories = Category::pluck('name', 'id');
    //     $isFeaturedOptions = Post::distinct('is_featured')->pluck('is_featured');

    //     $posts = Post::query();

    //     if ($category) {
    //         $posts->where('category_id', $category);
    //     }

    //     if ($isFeatured !== null) {
    //         $posts->where('is_featured', $isFeatured);
    //     }

    //     if ($tag) {
    //         // Retrieve the posts that have the selected tag
    //         $posts->whereHas('tags', function ($query) use ($tag) {
    //             $query->where('name', $tag);
    //         });
    //     }

    //     $allPosts = $posts->paginate(4);

    //     return view('frontend.posts.index', compact('allPosts', 'categories', 'isFeaturedOptions', 'featuredCategories', 'tags'));
    // }

// Filter Posts Start
public function filterPosts(Request $request)
{
    $allPosts = Post::latest()->paginate(4);
    $featuredCategories = Category::where('is_featured', true)->take(4)->get();

    $tags = Tag::all();

    $category = $request->input('category'); // Assign the value of 'category' parameter to $category variable
    $isFeatured = $request->input('is_featured'); // Assign the value of 'is_featured' parameter to $isFeatured variable
    $tag = $request->input('tag'); // Assign the value of 'tag' parameter to $tag variable

    $categories = Category::pluck('name', 'id');
    $isFeaturedOptions = Post::distinct('is_featured')->pluck('is_featured');

    $posts = Post::query();

    if ($category) {
        $posts->where('category_id', $category);
    }

    if ($isFeatured !== null) {
        $posts->where('is_featured', $isFeatured);
    }

    if ($tag) {
        // Retrieve the posts that have the selected tag
        $posts->whereHas('tags', function ($query) use ($tag) {
            $query->where('name', $tag);
        });
    }

    $allPosts = $posts->paginate(3);

    return view('frontend.posts.index', compact('allPosts', 'categories', 'isFeaturedOptions', 'featuredCategories', 'tags', 'category', 'isFeatured', 'tag'));
}
// Filter Posts End



    // Filter Posts End


}
