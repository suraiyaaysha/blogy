<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {

        $featuredCategories = DB::table('categories')->where('is_featured', true)->take(4)->get();

        if(Auth()->id()) {
            $user_type = Auth()->user()->user_type;

            if($user_type == 0) {
                return view('dashboard', compact('featuredCategories'));
            }
            else if($user_type == 1) {
                return view('admin.dashboard');
            }
            else {
                return redirect()->back();
            }

        }

    }
}
