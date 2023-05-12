<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::latest()->paginate(10);
        return view('admin.tag.index', compact('tags'))->with(
            'i',
            (request()->input('page', 1) - 1) *10
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $tag = new Tag;
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);

        $tag->save();

        // return back()->withSuccess('Category created successfully');
        return redirect('admin/tag')->with('message', 'Tag created successfully');

    }

    /**
     * Display the specified resource.
     */
    // public function show(Category $category)
    // {

    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tag = Tag::where('id', $id)->first();
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::all();

        // validate data
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $tag = Tag::where('id', $id)->first();

        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);

        $tag->save();

        // return view('admin.category.index', compact('category', 'categories'))->withSuccess('Category updated successfully');
        return back()->withSuccess('Tag Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tag = Tag::where('id', $id)->first();
        $tag->delete();
        return back()->withSuccess('Tag deleted successfully');
    }
}
