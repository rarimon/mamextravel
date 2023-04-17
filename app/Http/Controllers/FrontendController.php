<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //Home Page
    public function home_page(){
        return view('welcome');
    }
}
