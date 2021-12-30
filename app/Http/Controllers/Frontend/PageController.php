<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    public function index()
    {  
        $posts = Post::all()->orderBy('created_at','DESC')->paginate(8, ['*'], 'posts');
        return view('frontend.top-page', compact('posts'));
    }
    
}
