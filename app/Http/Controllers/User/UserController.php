<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{   
    public function edit($id)
    {   
        $user = $this->companyService->getCompanyId($id);
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
   
}
