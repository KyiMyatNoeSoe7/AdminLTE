<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
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
        $user = User::find($id);
        $user->update($request->all());

        return redirect('user/dashboard')->with('success', 'User updated successfully!');
    }
}
