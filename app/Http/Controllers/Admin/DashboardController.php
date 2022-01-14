<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\Admin\DashboardService;
class DashboardController extends Controller
{   

    private $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }
    public function index()
    {
        $users = $this->dashboardService->userCount();
        $posts = $this->dashboardService->postCount();
        return view('admin.admin-chart', compact('users','posts'));
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
        $user = User::find($id);
        $user->update($request->all());

        return redirect('admin/dashboard')->with('success', 'User updated successfully!');
    } 

}
