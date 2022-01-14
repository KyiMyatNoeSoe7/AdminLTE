<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
class PageController extends Controller
{
    public function index()
    {  
        $posts = Post::all();
        return view('frontend.top-page', compact('posts'));
    }
    
}
