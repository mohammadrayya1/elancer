<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategoriesController extends Controller
{

    public function index(){

        $categories=Category::get();
        $flashmessage=session("successful");

       return view("categories.index")
           ->with(['categories'=>$categories,
                   "title"=>"Categories",
                  "flashmessage"=>$flashmessage]);
    }


        public  function  show( Request $request){

            $category=Category::findOrFail($request->id);
            $title="Category-Details";

        return view("categories.show")->with(["title"=>$title,"category"=>$category]);


        }

        public  function create(){

        $title="Create";

            $parants=Category::get();
        return view ("categories.create")->with(["title"=>$title,"parants"=>$parants]);
        }



        public  function store(Request $request){

            $this->validateCategory($request);

        $category=new Category();


        $category->name=$request->input("name");
        $category->slug=Str::slug($category->name);
        $category->parent_id=$request->input("parent_id");
        $category->art_path=$request->input("art_path");
        $category->description=$request->input("description");

        $category->save();
        return redirect("/categories")->with(["successful"=>"The Category is created"]);

        }

        public function edit(Request $request){

            $category=Category::findOrFail($request->id);
            $parants=Category::all();
            return view("categories.edit")->with(["categories"=>$category,"parants"=>$parants]);
        }


    public function update(Request $request){

        $category=Category::findOrFail($request->id);
        $category->name=$request->input("name");
        $category->slug=Str::slug($category->name);
        $category->parent_id=$request->input("parent_id");
        $category->art_path=$request->input("art_path");
        $category->description=$request->input("description");
        $category->save();
        return redirect("/categories")->with(["successful"=>"The Category is updated"]);
    }


    public function destroy(Request $request){
            DB::table("categories")->where("id",$request->id)->delete();
           session()->flash("successful","The Category is deleted");
        return redirect("/categories");

    }

    protected function validateCategory(Request $request){
        return $request->validate([
            "name"=>["String","required","max:150"],
            "parent_id"=>["int",'nullable','exists:categories,id'],
            "description"=>["nullable","String"],
            "art_path"=>["nullable","image"]
        ]);
    }
}
