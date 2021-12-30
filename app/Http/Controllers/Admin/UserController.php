<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{   
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));     
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('users.create');
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     User::create($request->all());
     
    //     return redirect()->route('users.index')
    //                     ->with('success','User created successfully.');
    // }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $userData = User::find($id);
    //     return response()->json($userData);
    // }

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

        return redirect('admin/users')->with('success', 'User updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('admin/users')->with('success', 'User deleted successfully!');
    }
    // public function showUser(Request $request)
    // {   
    //     $users = User::query();
    //     if($request->keyword) {
    //         return $users->where('name', 'like', "%" . $request->keyword . "%")
    //        ->paginate(5);
    //     } else {
    //         return $users->all()->get()->paginate(5);
    //     }

    // }
}
