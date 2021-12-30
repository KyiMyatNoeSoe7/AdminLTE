<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $posts = Post::all();
        return view('admin.admin-dashboard', compact('users','posts'));
    }
}
