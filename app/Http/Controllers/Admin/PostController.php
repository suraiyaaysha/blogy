<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['tags'])->latest()->paginate(5);
        // $posts = Post::latest()->paginate(5);
        return view('admin.post.index', compact('posts'))->with(
            'i',
            (request()->input('page', 1) - 1) *5
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate data
        $request->validate([
            'title' => 'required|max:255',
            // 'thumbnail' => 'nullable|mimes:jpeg,jpg,png|max:15000',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:15000',
            'details' => 'required',
            'reading_duration' => 'required',
        ]);

        $category = Category::findOrFail($request->category_id);

        // $post = Post::findOrFail($request->post_id);

        $file = $request->thumbnail;
        $url = $file->move('uploads/blog-img' , $file->hashName());


        // Retrieve the authenticated user
        $user = Auth::user();

        // Create the post
        $post = Post::create([
            'category_id' => $request->category_id,
            'user_id' => $user->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'thumbnail' => $url,
            'details' => $request->details,
            'reading_duration' => $request->reading_duration,
            'is_featured' => $request->has('is_featured'),
        ]);

        // For adding tags
        if($request->has('tags')){
            $post->tags()->attach($request->tags);
        }

        $category->posts()->save($post);

        // return back()->withSuccess('Category created successfully');
         return redirect('admin/posts')->with('message', 'Post added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        $categories = Category::all();

        // To add views field, which posts viewed more
        $post->increment('views');

        return view('admin.post.show', compact('post', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Post $post)
    public function edit(int $post, Request $request)
    {
        $categories =Category::all();

        $post = Post::findOrFail($post);

        // Get the tags that were previously selected for the item
        $selectedTags = $post->tags->pluck('id')->toArray();
        // Get all the available tags
        $tags = Tag::all();

        // Pass the data to the view
        return view('admin.post.edit', compact('categories', 'post', 'tags', 'selectedTags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $post_id)
    {
        // validate data
        $request->validate([
            'title' => 'required|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:15000',
            'details' => 'required',
            'reading_duration' => 'required',
        ]);

        $category = Category::findOrFail($request->category_id);

        if ($request->hasFile('thumbnail')) {
            $file = $request->thumbnail;
            $url = $file->move('uploads/blog-img' , $file->hashName());
        } else {
            $url = $category->posts()->find($post_id)->thumbnail;
        }

        // Retrieve the authenticated user
        $user = Auth::user();

        // Update the post
        $post = Post::with(['tags'])->where('id', $post_id)->update([
            'category_id' => $request->category_id,
            'user_id' => $user->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'thumbnail' => $url,
            'details' => $request->details,
            'reading_duration' => $request->reading_duration,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect('admin/posts')->with('message', 'Post Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Post $post)
    public function destroy(int $post_id)
    {
        Post::findOrFail($post_id)->delete();
        return redirect('admin/posts')->with('message', 'Post Deleted successfully');
    }
}
