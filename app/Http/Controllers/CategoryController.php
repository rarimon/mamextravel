<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //category page
    public function category_page()
    {
        return view('admin.category.index');
    }
}
