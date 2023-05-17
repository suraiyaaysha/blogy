<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cms;

class SettingController extends Controller
{
    public function index()
    {
        // $sliders = Category::latest()->paginate(10);
        // return view('admin.category.index', compact('categories'))->with(
        //     'i',
        //     (request()->input('page', 1) - 1) *10
        // );
        // return view('admin.settings.index');
    }

    // public function home(){
    //     $cms = Cms::first();
    //     return view('admin.settings.index', compact('cms'));
    // }
}
