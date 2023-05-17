<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function authRedirect() {

        if(Auth()->id()) {
            $user_type = Auth()->user()->user_type;

            if($user_type == 0) {
                // return view('dashboard');
                // return view('home');
                // return view('/');
                return redirect('/'); // Redirect to the root URL
            }
            else if($user_type == 1) {
                // return view('admin.dashboard');
                return redirect()->route('admin.dashboard'); // Redirect to a named route 'admin/dashboard'
            }
            else {
                return redirect()->back();
            }

        }

    }
}
