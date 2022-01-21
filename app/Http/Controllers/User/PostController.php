<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PostsExport;
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
        $posts = Post::all();
    
        return view('user.user-posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.user-posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|unique:posts,name',
            'description' => 'required',
        ]);
    
        $post = Post::create($request->all());
        $post->save();
        $posts = Post::all();
        return view('user.user-posts.index',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $post = Post::findOrFail($id);
        return view('user.user-posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:posts,name',
            'description' => 'required',
        ]);
        $post = Post::findOrFail($id);
        $post->update($request->all());
        $posts = Post::all();
        return view('user.user-posts.index',compact('posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $post = Post::findOrFail($id);
        $post->delete();
    
        $posts = Post::all();
        return view('user.user-posts.index',compact('posts'));
    }

     /**
     * To export student table to csv file
     * @param
     * @return
     */
    public function postExport()
    {
        return Excel::download(new PostsExport, 'posts.csv');
    }

    /**
     * To import csv to student table
     * @param Request $request (csv file)
     * @return
     */
    public function postImport(Request $request)
    {   
        if (($handle = fopen($request->file('file'), 'r' )) !== FALSE) {
            $importData_arr = array();
            $i = 1;
            while ( ($data = fgetcsv( $handle, 1000, ',' )) !== FALSE ) {
                      $num = count($data);
                      for ($c=0; $c < $num; $c++) {
                          $importData_arr[$i][] = $data [$c];
                      }
                      $i++;
                  }
         
               foreach ($importData_arr as $key=>$importData) {
                    if ($key == 1) {     
                        continue;
                    }
                    $postExist = Post::where('name', $importData[1])->exists();

                    if(! $postExist) {
                        $insertData = array(
                            "name"=>$importData[1],
                            "description"=>$importData[2]);
                        DB::table('posts')->insert($insertData);
                    }
                  }
            }
            fclose ( $handle );
        $posts = Post::all();
        return view('user.user-posts.index',compact('posts'));
    }

}

