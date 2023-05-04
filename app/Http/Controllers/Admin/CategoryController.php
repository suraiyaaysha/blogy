<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('admin.category.index', compact('categories'))->with(
            'i',
            (request()->input('page', 1) - 1) *5
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required|max:255',
            // 'slug' => 'required|max:255',
            'label' => 'nullable|max:255',
        ]);

        $category = new Category;
        $category->name = $request->name;
        // $category->slug = $request->slug;
        $category->slug = Str::slug($request->name);
        $category->label = $request->label;

        $category->save();

        // return back()->withSuccess('Category created successfully');
        return redirect('admin/category')->with('message', 'Category created successfully');

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
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categories = Category::all();

        // validate data
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'label' => 'nullable|max:255',
        ]);

        $category = Category::where('id', $id)->first();

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->label = $request->label;

        $category->save();

        // return view('admin.category.index', compact('category', 'categories'))->withSuccess('Category updated successfully');
        return back()->withSuccess('Category Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::where('id', $id)->first();
        $category->delete();
        return back()->withSuccess('Category deleted successfully');
    }
}
