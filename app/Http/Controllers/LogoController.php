<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use Auth;
use Carbon\Carbon;
use Image;

class LogoController extends Controller
{
    //logo page 
    public function logo_page()
    {
        $logo_info = Logo::latest()->get();
        return view('admin.logo.index', [
            'logo_info' => $logo_info,
        ]);
    }

    //insert logo
    public function insert_logo(Request $request)
    {
        $request->validate([
            'logo_image' => 'required|Image',

        ]);


        $logo_id = Logo::insertGetId([
            'added_by' => Auth::id(),
            'logo_name' => $request->logo_name,
            'created_at' => Carbon::now(),
        ]);


        $new_logo_image = $request->logo_image;
        $extention = $new_logo_image->getClientOriginalExtension();
        $new_logo_image_name = $logo_id . '.' . $extention;

        //resize none ,update korte hobe. 
        Image::make($new_logo_image)->save(base_path('/public/upload/logo/' . $new_logo_image_name));
        Logo::find($logo_id)->update([
            'logo_image' => $new_logo_image_name,
        ]);

        return back()->with('success', 'Logo Insert Successfully');
    }



    //delete lgo
    public function delete_logo($logo_id)
    {
        Logo::find($logo_id)->delete();
        return back()->with('success', 'Logo Delete Successfully !');
    }

    //update_status
    public function update_status($logo_id)
    {
        if (Logo::find($logo_id)->status == 0) {

            $total_status = Logo::where('status', 1)->count();

            if ($total_status == 1) {
                return back()->with('warning', 'Maximun 1 Logo Activeted!');
            } else {

                Logo::find($logo_id)->update([
                    'status' => 1,
                    'updated_at' => Carbon::now(),
                ]);
                return back()->with('success', 'Logo Activeted');
            }
        } else {

            $total_status = Logo::where('status', 1)->count();
            if ($total_status == 1) {
                Logo::find($logo_id)->update([
                    'status' => 0,
                    'updated_at' => Carbon::now(),
                ]);
                return back()->with('success', 'Logo Deactiveted');
            } else {
                return back()->with('warning', 'Maximun 1 Logo Activeted!');
            }
        }
    }
}
