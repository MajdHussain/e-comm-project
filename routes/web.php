<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::get('/adminLogout', function () {
    Session::forget('Admin');
    return redirect('login');
});

Route::post("/login",[UserController::class,'login']);
Route::post("/register",[UserController::class,'Register']);
Route::get("/",[ProductController::class,'index']);
Route::get("detail/{id}",[ProductController::class,'detail']);
Route::get("search",[ProductController::class,'search']);
Route::get("searchF",[ProductController::class,'searchFilter']);
Route::post("add_to_cart",[ProductController::class,'addToCart']);
Route::get("cartlist",[ProductController::class,'cartList']);
Route::get("removecart/{id}",[ProductController::class,'removeCart']);
Route::get("ordernow",[ProductController::class,'orderNow']);
Route::post("orderplace",[ProductController::class,'orderPlace']);
Route::get("myorders",[ProductController::class,'myOrders']);
Route::view("/register",'register');
Route::get("/filter",[ProductController::class,'filter']);
Route::get("/adminPage",[AdminController::class,'index']);
Route::post("/createItem",[AdminController::class,'create']);
Route::view("/createItem",'createItem');
Route::get("detailAdmin/{id}",[AdminController::class,'detail']);
Route::post("update",[AdminController::class,'updateItem']);
Route::get("deleteItem/{id}",[AdminController::class,'delete']);
Route::get("adminorders/{id}",[AdminController::class,'adminOrders']);
Route::post("ordersupdate",[AdminController::class,'updateStatus']);
Route::get("users",[AdminController::class,'showUsers']);
Route::post("banuser",[AdminController::class,'ban']);
Route::post("unbanuser",[AdminController::class,'unBan']);
Route::get("userssearch",[AdminController::class,'searchUsers']);
Route::get("page/{id}",[ProductController::class,'pagesN']);
Route::get("Apages/{id}",[AdminController::class,'pagesN']);
Route::get("adminsearch",[AdminController::class,'search']);
Route::get("ordersF",[AdminController::class,'ordersfilter']);
Route::get("ordersS",[AdminController::class,'sOrders']);