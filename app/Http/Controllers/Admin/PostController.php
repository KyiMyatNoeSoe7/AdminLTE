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
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {   
    //     $request->validate([
    //         'name' => 'required|unique:posts,name',
    //         'description' => 'required',
    //     ]); 
        
    //     $post = new Post;
    //     $post->name = $request->name;
    //     $post->description = $request->description;

    //     $post->save();
    //     return $post;
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.post-detail', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id) 
    // {   
    //     $request->validate([
    //         'name' => 'required|unique:posts,name',
    //         'description' => 'required',
    //     ]);   
    //     $post = Post::findOrFail($id);
    //     $post->name = $request->name;
    //     $post->description = $request->description;
    
    //     $post->update();
    //     return $post;
    // }

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

        return redirect('admin/posts')->with('success', 'Post deleted successfully!');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function showPost(Request $request)
    // {   
    //     $posts = Post::query();
    //     if($request->keyword) {
    //         return $posts->where('name', 'like', "%" . $request->keyword . "%")
    //        ->paginate(5);
    //     } else {
    //         return $posts->all()->get()->paginate(5);
    //     }

    // }

}
