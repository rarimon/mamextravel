<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    //show all user list
    public function all_user_list()
    {

        $user_info = User::latest()->get();
        $user_total=User::count();
        return view('admin.user.user_list', [
            'user_info' => $user_info,
            'user_total' => $user_total,
        ]);
    }

    //insert user page
    public function insert_user_page()
    {
        return view('admin.user.add_user');
    }


    //insert user 
    public function insert_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'password' => Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),

        ]);

        return redirect('/all/user')->with('success', 'Unser Insert Successfully !');
    }



    //delete user
    public function delete_user($user_id)
    {
        User::find($user_id)->delete();

        return back()->with('delete', 'User Delete Successfully !');
    }
}
