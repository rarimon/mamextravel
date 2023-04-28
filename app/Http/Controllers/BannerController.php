<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Auth;
use Carbon\Carbon;
use Image;


class BannerController extends Controller
{
    //banner page 
    public function banner_page()
    {
        $banner_info = Banner::latest()->get();
        return view('admin.banner.index', [
            'banner_info' => $banner_info,
        ]);
    }

    //insert_banner
    public function insert_banner(Request $request)
    {
        $request->validate([
            'banner_image' => 'required|Image',

        ]);


        $banner_id = Banner::insertGetId([
            'added_by' => Auth::id(),
            'banner_title' => $request->title_name,
            'banner_subtitle' => $request->subtitle_name,
            'created_at' => Carbon::now(),
        ]);


        $new_banner_image = $request->banner_image;
        $extention = $new_banner_image->getClientOriginalExtension();
        $new_banner_image_name = $banner_id . '.' . $extention;

        //resize none ,update korte hobe. 
        Image::make($new_banner_image)->save(base_path('/public/upload/banner/' . $new_banner_image_name));
        Banner::find($banner_id)->update([
            'banner_image' => $new_banner_image_name,
        ]);

        return back()->with('success', 'Banner Insert Successfully');
    }



    //delete_banner
    public function delete_banner($banner_id)
    {
        Banner::find($banner_id)->delete();
        return back()->with('success', 'Banner Delete Successfully !');
    }

    //    //update_status
    //    public function update_status($logo_id)
    //    {
    //        if (Logo::find($logo_id)->status == 0) {

    //            $total_status = Logo::where('status', 1)->count();

    //            if ($total_status == 1) {
    //                return back()->with('warning', 'Maximun 1 Logo Activeted!');
    //            } else {

    //                Logo::find($logo_id)->update([
    //                    'status' => 1,
    //                    'updated_at' => Carbon::now(),
    //                ]);
    //                return back()->with('success', 'Logo Activeted');
    //            }
    //        } else {

    //            $total_status = Logo::where('status', 1)->count();
    //            if ($total_status == 1) {
    //                Logo::find($logo_id)->update([
    //                    'status' => 0,
    //                    'updated_at' => Carbon::now(),
    //                ]);
    //                return back()->with('success', 'Logo Deactiveted');
    //            } else {
    //                return back()->with('warning', 'Maximun 1 Logo Activeted!');
    //            }
    //        }
    //    }
}
