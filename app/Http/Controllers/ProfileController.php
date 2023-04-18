<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Image;

class ProfileController extends Controller
{
    //profile page
    public function profile_page()
    {

        return view('admin.profile.index');
    }



    //update name
    public function nameupdate(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);

        User::find(Auth::id())->update([
            'name' => $request->name,
            'updated_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Name Update Successfull !');
    }


    //update name
    public function phonenumberupdate(Request $request)
    {

        $request->validate([
            'phone' => 'required',
        ]);

        User::find(Auth::id())->update([
            'phone' => $request->phone,
            'updated_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Phone Number Update Successfull !');
    }



    //update name
    public function password_update(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password' => Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
        ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {
            User::find(Auth::id())->update([
                'password' => bcrypt($request->password),
            ]);
            return back()->with('success', 'Password Change Successfull !');
        } else {
            return back()->with('alert', 'Old Password Douch Not Match! ');
        }
    }

    //photo update
    public function photo_update(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image',
        ]);

        $new_profile_photo = $request->profile_photo;
        $extention = $new_profile_photo->getClientOriginalExtension();
        $photo_name = Auth::id() . '.' . $extention;

        if (Auth::user()->profile_photo != 'default.jpg') {
            $path = public_path() . "/upload/user/" . Auth::user()->profile_photo;
            unlink($path);
        }

        Image::make($new_profile_photo)->save(base_path('/public/upload/user/' . $photo_name));
        User::find(Auth::id())->update([
            'profile_photo' => $photo_name,
        ]);
        return back()->with('success', ' Photo Change Successfull ');
    }
}
