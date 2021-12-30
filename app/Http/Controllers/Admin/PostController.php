<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = Post::get();
        return view('admin.admin-posts.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $post = Post::findOrFail($id);
        return view('admin.admin-posts.posts-detail', compact('post'));

    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        $post = Post::findOrFail($id);
        $post->delete();

        $posts = Post::all();
        return view('admin.admin-posts.index',compact('posts'));
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPost(Request $request)
    {   
        $posts = Post::query();
        if($request->keyword) {
            return $posts->where('name', 'like', "%" . $request->keyword . "%")
           ->paginate(5);
        } else {
            return $posts->all()->get()->paginate(5);
        }

    }

}
