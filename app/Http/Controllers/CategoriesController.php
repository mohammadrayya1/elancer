<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{

    public function index(){

    $categories= DB::table("categories")->get();
        //return view("categories",["categories"=>$categories]);

       // dd($categories);
        return view("categories.index")->with(['categories'=>$categories,"title"=>"Categories"]);
    }


        public  function  show( Request $request){
        $category=DB::table("categories")->where("id","=",$request->id)->first();
        dd($category);
        }
}
