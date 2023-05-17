<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Visitor;
use App\Models\Tag;

class DashboardController extends Controller
{
    public function showAllInformation()
    {
        $categories = Category::count();
        $posts = Post::count();
        $subscribers = Subscriber::count();
        $users = User::count();
        $totalVisitors = Visitor::count();
        $tags = Tag::count();

        return view('admin.dashboard', compact('categories', 'posts', 'subscribers', 'users', 'totalVisitors', 'tags'));
    }
}
