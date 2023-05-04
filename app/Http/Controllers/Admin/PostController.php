<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
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

        return view('admin.post.create', compact('categories'));
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
            'details' => 'required',
        ]);

    // Different way to save start
        // $category = Category::findOrFail($request->category_id);

        // $post = new Post;
        // $post->title = $request->title;
        // $post->slug = Str::slug($request->title);
        // $post->details = $request->details;

        // $category->posts()->save($post);

    // Different way to save end

        $category = Category::findOrFail($request->category_id);
        $category->posts()->create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'details' => $request->details,
            'thumbnail' => $request->thumbnail,
        ]);

        // return back()->withSuccess('Category created successfully');
        return redirect('admin/posts')->with('message', 'Post created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Post $post)
    public function edit(int $post)
    {
        $categories =Category::all();

        $post = Post::findOrFail($post);
        return view('admin.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
