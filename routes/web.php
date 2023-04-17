<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;








//==================Frontend Area Start===============================//

Route::get('/', [FrontendController::class, 'home_page']);


//==================Frontend Area End===============================//


//==================Admin Area Start================================//
Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');

//User 
Route::get('/all/user', [UserController::class, 'all_user_list']);
Route::get('/add/user', [UserController::class, 'insert_user_page']);
Route::post('/insert/user', [UserController::class, 'insert_user']);
Route::get('/user/delete/{user_id}', [UserController::class, 'delete_user']);



//Category
Route::get('/category', [CategoryController::class, 'category_page']);



//==================Admin Area End================================//
