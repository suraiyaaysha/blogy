<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['tags'])->latest()->paginate(5);
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

    // Different way to save start
        // $category = Category::findOrFail($request->category_id);

        // $post = new Post;
        // $post->title = $request->title;
        // $post->slug = Str::slug($request->title);
        // $post->details = $request->details;

        // $category->posts()->save($post);

    // Different way to save end

        $category = Category::findOrFail($request->category_id);
        $post = Post::findOrFail($request->post_id);

        $file = $request->thumbnail;
        $url = $file->move('uploads/blog-img' , $file->hashName());

        //  $post = Auth::user()->posts()->create([
         $category->posts()->create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'details' => $request->details,
            'reading_duration' => $request->reading_duration,
            'thumbnail' => $url,
        ]);

        // For adding tags
        if($request->has('tags')){
            $post->tags()->attach($request->tags);
        }

        $category->posts()->save($post);

        // return back()->withSuccess('Category created successfully');
        return redirect('admin/posts')->with('message', 'Post created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(int $post)
    {
        $categories =Category::all();

        $post = Post::findOrFail($post);
        return view('admin.post.show', compact('categories', 'post'));
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
    public function update(Request $request, $post_id)
    {
    // Different way to Update start
        // $post = Category::findOrFail($request->category_id)->posts()->where('id', $post_id)->first();

        // $post->title = $request->title;
        // $post->slug = Str::slug($request->title);
        // $post->details = $request->details;

        // $post->update();

    // Different way to Update end

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

        $category->posts()->where('id', $post_id)->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'details' => $request->details,
            'reading_duration' => $request->reading_duration,
            'thumbnail' => $url,
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
