<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
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

    public function edit($id)
    {   
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
            'phone_no' => ['nullable','string','max:15','unique:users,phone_no'],
            'address' => ['nullable'],
        ]);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
            'phone_no' => $request['phone_no'],
            'address' => $request['address'],
            'photo' => $request['photo'],
        ]);
        $user->save();
        $users = User::all();
        return view('admin.users.index',compact('users'));
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
            "role" => $request->role,
            "updated_at" => now()
        ]);
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }
}
