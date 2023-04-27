<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\DigitalFeciliti;
use App\Models\OtherFaciliti;
use App\Models\HotelChoose;
use App\Models\Room;


use App\Models\Hotel;
use Auth;
use Carbon\Carbon;
use Image;


class HotelController extends Controller
{
    //hotel page
    public function hotel_page()
    {
        $hotel_info = Hotel::latest()->get();
        $total_hotel = Hotel::count();

        return view('admin.hotel.index', [
            'hotel_info' => $hotel_info,
            'total_hotel' => $total_hotel,

        ]);
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

    //delete hotel
    public function hotel_delete($hotel_id)
    {
        Hotel::find($hotel_id)->delete();
        return back()->with('delete', 'Hotel Delete Successfully !');
    }

    //edite hotel page
    public function hotel_edit_page($hotel_id)
    {
        $category_info = Category::all();
        $hotel_info = Hotel::find($hotel_id);
        return view('admin.hotel.edit_page', [
            'category_info' => $category_info,
            'hotel_info' => $hotel_info,
        ]);
    }

    //update hotel 
    public function hotel_update(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'hotel_name' => 'required',
            'hotel_location' => 'required',
            'owner_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'dsp_title' => 'required',
        ]);


        Hotel::find($request->hotel_id)->update([
            'category_id' => $request->category_id,
            'hotel_name' => $request->hotel_name,
            'hotel_location' => $request->hotel_location,
            'owner_name' => $request->owner_name,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
            'description_title' => $request->dsp_title,
            'map_link' => $request->map_link,
            'updated_at' => Carbon::now(),
        ]);


        $hotel_id = $request->hotel_id;
        $new_hotel_image = $request->hotel_image;
        $extention = $new_hotel_image->getClientOriginalExtension();
        $new_hotel_image_name = $hotel_id . '.' . $extention;


        Image::make($new_hotel_image)->save(base_path('/public/upload/hotel_image/' . $new_hotel_image_name));
        Hotel::find($hotel_id)->update([
            'hotel_image' => $new_hotel_image_name,
        ]);

        return redirect('/hotel')->with('success', 'Hotel Update Successfully');
    }
    //hotel_faciliti_page
    public function hotel_faciliti_page($hotel_id)
    {
        $hotel_id = $hotel_id;
        $hotel_name = Hotel::find($hotel_id)->hotel_name;
        $digital_faciliti_info = DigitalFeciliti::where('hotel_id', $hotel_id)->get();

        $other_faciliti_info = OtherFaciliti::where('hotel_id', $hotel_id)->get();

        $hotel_choose_info = HotelChoose::where('hotel_id', $hotel_id)->get();

        return view('admin.hotel.faciliti', [
            'hotel_id' => $hotel_id,
            'digital_faciliti_info' => $digital_faciliti_info,
            'other_faciliti_info' => $other_faciliti_info,
            'hotel_choose_info' => $hotel_choose_info,
            'hotel_name' => $hotel_name,
        ]);
    }


    //insert_digital_faciliti
    public function insert_digital_faciliti(Request $request)
    {
        $request->validate([
            'faciliti_name' => 'required',
        ]);

        DigitalFeciliti::insert([
            'hotel_id' => $request->hotel_id,
            'added_by' => Auth::id(),
            'faciliti_name' => $request->faciliti_name,
            'icon_name' => $request->icon_name,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success', 'Data Insert Successfull');
    }

    //delete_digital_ficiliti
    public function delete_digital_ficiliti($hotel_id)
    {
        DigitalFeciliti::find($hotel_id)->delete();
        return back()->with('success', 'Delete Successfull');
    }




    //insert_other_faciliti
    public function insert_other_faciliti(Request $request)
    {
        $request->validate([
            'faciliti_name' => 'required',
        ]);

        OtherFaciliti::insert([
            'hotel_id' => $request->hotel_id,
            'added_by' => Auth::id(),
            'faciliti_name' => $request->faciliti_name,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success', 'Data Insert Successfull');
    }

    //delete_other_ficiliti
    public function delete_other_ficiliti($hotel_id)
    {
        OtherFaciliti::find($hotel_id)->delete();
        return back()->with('success', 'Delete Successfull');
    }


    //insert_choose_us
    public function insert_choose_us(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        HotelChoose::insert([
            'hotel_id' => $request->hotel_id,
            'added_by' => Auth::id(),
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success', 'Data Insert Successfull');
    }


    //delete_choose_us
    public function delete_choose_us($hotel_id)
    {
        HotelChoose::find($hotel_id)->delete();
        return back()->with('success', 'Delete Successfull');
    }



    //room_page
    public function room_page($hotel_id)
    {

        $hotel_name = Hotel::find($hotel_id)->hotel_name;
        $hotel_id = $hotel_id;
        return view('admin.hotel.rooms', [
            'hotel_name' => $hotel_name,
            'hotel_id' => $hotel_id,
        ]);
    }



    //room_add
    public function room_add(Request $request)
    {
        $request->validate([
            'room_type' => 'required',
            'room_location' => 'required',
            'description' => 'required',
            'price' => 'required',
            'dsp_title' => 'required',
            'room_image' => 'required',
        ]);



        $room_id = Room::insertGetId([
            'added_by' => Auth::id(),
            'hotel_id' => $request->hotel_id,
            'room_type' => $request->room_type,
            'room_location' => $request->room_location,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
            'description_title' => $request->dsp_title,
            'created_at' => Carbon::now(),
        ]);


        $new_room_image = $request->room_image;
        $extention = $new_room_image->getClientOriginalExtension();
        $new_room_image_name = $room_id . '.' . $extention;



        Image::make($new_room_image)->save(base_path('/public/upload/hotel_image/room/' . $new_room_image_name));
        Room::find($room_id)->update([
            'room_image' => $new_room_image_name,
        ]);





        return back()->with('success', 'Room Insert Successfully !');
    }
}
