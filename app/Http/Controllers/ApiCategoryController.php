<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class ApiCategoryController extends Controller
{
   public function all(){
       $categories= Category::all();
        return CategoryResource::collection($categories);
   }


public function show($id){


        $category=Category::find($id);

        if($category==null){
            return response()->json([

                "msg" => "category not found"

            ],404);
        }

        return new CategoryResource($category);
}

public function store(Request $request){
//valdation

        $validator =Validator::make($request->all(),[


            "title" => 'required|string|max:100',
            "desc" => 'required|string',
            "image"=>'required|image|mimes:png,jpg,jpeg,Gif'
        ]);
        if($validator->fails()){
        return response()->json([
            "msg" => $validator->errors()
        ],409);
    }


        //create

        $imageName = Storage::putFile ("categories",$request->image);

      $category= Category::create([
         "title"=>$request->title,
         "desc"=>$request->desc,
        "image"=>$imageName,
        ]);


        return response()->json([

            "msg" => "category inserted sucessfuly",
            "category"=> new CategoryResource($category)

        ],201);

}

public function update( Request $request,$id){

    $validator =Validator::make($request->all(),[


        "title" => 'required|string|max:100',
        "desc" => 'required|string',
        "image"=>'image|mimes:png,jpg,jpeg,Gif'
    ]);
    if($validator->fails()){
    return response()->json([
        "msg" => $validator->errors()
    ],409);

}


$category=Category::find($id);

if($category==null){
    return response()->json([

        "msg" => "category not found"

    ],404);
}

if($request->has('image')){
    Storage::delete($category->image);
    $imageName=Storage::putFile("categories",$request->image);
}

$category-> update([
    "title"=>$request->title,
    "desc"=>$request->desc,
   "image"=>$imageName,
   ]);

   return response()->json([

    "msg" => "category updated sucessfuly",
    "category"=> new CategoryResource($category)

],201);


}

public function delete($id){

    $category=Category::find($id);

        if($category==null){
            return response()->json([

                "msg" => "category not found"

            ],404);
        }

        if($category){

            Storage::delete($category->image);
        }
        
        $category->delete();

        return response()->json([

    "msg" => "category deleted sucessfuly",

],201);


}



}
