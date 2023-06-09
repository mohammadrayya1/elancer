<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
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

Route::get('/', function () {
    return view('welcome');
});


//Route::get("/categories",function (){
//    return "Categories";
//});


Route::get("/categories",[CategoriesController::class,"index"]);
Route::get("categories/create",[CategoriesController::class,"create"]);
Route::get("categories/{id}",[CategoriesController::class,"show"]);
Route::post("categories",[CategoriesController::class,"store"]);
Route::get("categories/edit/{id}",[CategoriesController::class,"edit"]);
Route::put("categories/{id}",[CategoriesController::class,"update"]);
Route::delete("categories/{id}",[CategoriesController::class,"destroy"]);

