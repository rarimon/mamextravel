<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Hotel;
use Auth;
use Carbon\Carbon;
use Image;


class HotelController extends Controller
{
    //hotel page
    public function hotel_page()
    {
        return view('admin.hotel.index');
    }


    //insert hotel page
    public function add_hotel_page()
    {


        $category_info = Category::all();

        return view('admin.hotel.insert_hotel', [

            'category_info' =>  $category_info,
        ]);
    }


    //add hotel
    public function hotel_add(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'hotel_name' => 'required',
            'hotel_location' => 'required',
            'description' => 'required',
            'price' => 'required',
            'dsp_title' => 'required',
            'hotel_image' => 'required',
        ]);



        $hotel_id =    Hotel::insertGetId([
            'category_id' => $request->category_id,
            'added_by' => Auth::id(),
            'hotel_name' => $request->hotel_name,
            'hotel_location' => $request->hotel_location,
            'owner_name' => $request->owner_name,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
            'description_title' => $request->dsp_title,
            'map_link' => $request->map_link,
            'created_at' => Carbon::now(),
        ]);


        $new_hotel_image = $request->hotel_image;
        $extention = $new_hotel_image->getClientOriginalExtension();
        $new_hotel_image_name = $hotel_id . '.' . $extention;



        Image::make($new_hotel_image)->save(base_path('/public/upload/hotel_image/' . $new_hotel_image_name));
        Hotel::find($hotel_id)->update([
            'hotel_image' => $new_hotel_image_name,
        ]);





        return back()->with('success', 'Hotel Insert Successfully !');
    }
}
