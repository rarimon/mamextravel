<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
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
Route::get('/add/category', [CategoryController::class, 'add_category_page']);
Route::post('/insert/category', [CategoryController::class, 'insert_category']);
Route::get('/category/delete/{category_id}', [CategoryController::class, 'delete_category']);
Route::get('/category/edit/{category_id}', [CategoryController::class, 'edit_category']);
Route::post('/update/category', [CategoryController::class, 'update_category']);

//Profile
Route::get('/edit/profile', [ProfileController::class, 'profile_page']);
Route::post('/name/update', [ProfileController::class, 'nameupdate']);
Route::post('/password/update', [ProfileController::class, 'password_update']);
Route::post('/photo/update', [ProfileController::class, 'photo_update']);


//Hotel
Route::get('/hotel', [HotelController::class, 'hotel_page']);
Route::get('/insert/hotel', [HotelController::class, 'add_hotel_page']);
Route::post('/add/hotel', [HotelController::class, 'hotel_add']);
Route::get('/hotel/delete/{hotel_id}', [HotelController::class, 'hotel_delete']);
Route::get('/edit/hotel/{hotel_id}', [HotelController::class, 'hotel_edit_page']);
Route::post('/update/hotel', [HotelController::class, 'hotel_update']);
Route::get('/hotel/facilities/{hotel_id}', [HotelController::class, 'hotel_faciliti_page']);
Route::post('/insert/digital_ficiliti', [HotelController::class, 'insert_digital_faciliti']);
Route::get('/delete/digital_ficiliti/{hotel_id}', [HotelController::class, 'delete_digital_ficiliti']);
Route::post('/insert/other_ficiliti', [HotelController::class, 'insert_other_faciliti']);
Route::get('/delete/other_ficiliti/{hotel_id}', [HotelController::class, 'delete_other_ficiliti']);
Route::post('/insert/choose_us', [HotelController::class, 'insert_choose_us']);
Route::get('/delete/choose_us/{hotel_id}', [HotelController::class, 'delete_choose_us']);
//Rooms
Route::get('/rooms/{hotel_id}', [HotelController::class, 'room_page']);
Route::post('/add/room', [HotelController::class, 'room_add']);











//==================Admin Area End================================//
