<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{   
    public function index()
    {    
        $user = User::findOrFail(Auth::user()->id);
        return view('user.user-dashboard', compact('user'));
    } 
     
    public function edit($id)
    {   
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
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

            return redirect('user/dashboard')->with('success', 'User updated successfully!');
    }
}
