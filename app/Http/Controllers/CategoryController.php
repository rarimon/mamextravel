<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //category page
    public function category_page()
    {
        $category_info = Category::all();
        $category_total = Category::count();
        return view('admin.category.index', [
            'category_info' =>   $category_info,
            'category_total' => $category_total,
        ]);
    }
    //add category page
    public function add_category_page()
    {
        return view('admin.category.add_category');
    }
    //insert category
    public function insert_category(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);


        Category::insert([
            'category_name' => $request->category_name,
            'added_by' => Auth::id(),
            'icon_name' => $request->icon_name,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success', 'Category Insert Successfully !');
    }

    //delete category
    public function delete_category($category_id)
    {
        Category::find($category_id)->delete();
        return back()->with('delete', 'Category Delete Successfully !');
    }

    //edit category page
    public function edit_category($category_id)
    {
        $category_info = Category::find($category_id);
        return view('admin.category.edit', [
            'category_info' => $category_info,
        ]);
    }

    // update category
    public function update_category(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);



        Category::find($request->category_id)->update([
            'category_name' => $request->category_name,
            'added_by' => Auth::id(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect('/category')->with('success', 'Category Update Successfully !');
    }
}
