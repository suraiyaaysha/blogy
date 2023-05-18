<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Share;
// use Share;

class SocialShareController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function socialShare(string $post_slug)
    {
        $featuredCategories = Category::where('is_featured', true)->take(4)->get();
         $post = Post::where('slug', $post_slug)->first();
        // Determine the link URL for the "View All" link
        $viewAllLinkUrl = '';
        if ($post->category->posts()->count() > 1) {
            $viewAllLinkUrl = route('categories.category', $post->category->slug);
        } else {
            $viewAllLinkUrl = route('posts.index');
        }

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


        $shareButtons = \Share::page(
            'https://www.bloggy.com',
            'Your share text comes here'
        )
        ->facebook()
        ->twitter()
        ->pinterest();

        $posts = Post::get();

        return view('frontend.posts.post-details', compact('shareButtons', 'posts', 'featuredCategories', 'post', 'viewAllLinkUrl', 'relatedPosts'));
    }
}
