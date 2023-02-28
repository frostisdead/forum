<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function change_role($id)
    {
        $user = User::where('id',$id)->get();
        return view('user.chrole', ['user' => $user]);
    }
public function update (Request $request, $id) {
        $user = User::findOrFail($id);
        $user->role = $request->input('role');
        $user->save();

        return redirect()->back()->with('message', 'Role changed successfully.');
}
public function delete($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('dashboard')->with('success','User deleted successfully');
}
public function ban($id)
{
    $user = User::find($id);
    $user->banned = true;
    $user->save();
    return redirect()->back()->with('message', 'User has been banned successfully');
}

public function unban($id)
{
    $user = User::find($id);
    $user->banned = false;
    $user->save();
    return redirect()->back()->with('message', 'User has been unbanned successfully');
}
}