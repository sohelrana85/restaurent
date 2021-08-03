<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.pages.users', compact('users'));
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        if($user){
            $user->delete();

            session()->flash('type','success');
            session()->flash('message','A User Deleted Successfully');
            return redirect()->back();
        }
    }
}
