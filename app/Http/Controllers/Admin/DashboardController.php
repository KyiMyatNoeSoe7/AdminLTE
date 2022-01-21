<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{   

    public function index()
    {
        $users = User::select('id', 'created_at')->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('m');
        });

        $userMonthCount = [];
        $userArr = [];

        foreach ($users as $key => $value) {
            $userMonthCount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($userMonthCount[$i])){
                $userArr[$i] = $userMonthCount[$i];    
            }else{
                $userArr[$i] = 0;    
            }
        }

        
    	$posts = Post::select('id', 'created_at')->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('m'); 
        }); 
        $postMonthCount = [];
        $postArr = [];

        foreach ($posts as $key => $value) {
            $postMonthCount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($postMonthCount[$i])){
                $postArr[$i] = $postMonthCount[$i];    
            }else{
                $postArr[$i] = 0;
            }
        }

        $postCount = $postArr;
    	$userCount = $userArr;    	
    
        return view('admin.admin-chart', compact('postCount','userCount'));

    }

    public function profile()
    {    
        $user = User::findOrFail(Auth::user()->id);
        return view('admin.admin-dashboard', compact('user'));
    }
    
    public function edit($id)
    {   
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {  
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photoName = $photo->getClientOriginalName();
            $request->file('photo')->storeAs('public/user-photos',$photoName);
            User::where('id', $id)
                ->update([
                    "photo" => $photoName,
                ]);
        }
        User::where('id', $id)
            ->update([
                "name" => $request->name,
                "phone_no" => $request->phone_no,
                "address" => $request->address,
                "updated_at" => now()
            ]);
        return redirect('admin/dashboard')->with('success', 'User updated successfully!');
    } 

}
