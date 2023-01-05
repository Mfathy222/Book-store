<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class CategoryController extends Controller
{
    public function all()
    {

        //category-> all
        // paginatation
        //1-all or get -> paginate()
        //2- page all $category->links()
        $categories = Category::paginate(2);


        //view
        return view("categories.all", compact("categories"));
    }
    //show
    public function show($id)
    {
        $category = Category::findorfail($id);
        return view("categories.show", compact("category"));
    }
    //create
    public function create()
    {
        return view('categories.create');
    }
    //store or post
    public function store(Request $request)
    {

        //validation

        $data = $request->validate(
            [
                "title" => 'required|string|max:100',
                "desc" => 'required|string',
                "image" => 'image|mimes:png,jpg,jpeg,Gif'
            ]
        );

        // uplode image and store image in dd
        $data['image'] = Storage::putFile("categories", $data['image']);




        //store
        Category::create(
            $data
            //     [
            //     "title" => $request->title,
            //     "desc" => $request->desc,
            // ]
        );

        session()->flash("success", "date insertd successfuly");

        //route

        return redirect(url('categories'));


    }
    //update or edit
    public function edit($id)
    {

        $category = Category::findorfail($id);

        return view('categories.edit', ["category" => $category]);
    }
    //update
    public function update($id, Request $request)
    {

        //validtion
        $data = $request->validate(
            [
                "title" => 'required|string|max:100',
                "desc" => 'required|string',
                "image" => 'image|mimes:png,jpg,jpeg'
            ]
        );

        //check
        $category = Category::findorfail($id);

        if ($request->has('image')) {
            Storage::delete($category->image);
            $data['image'] = Storage::putFile("categories", $data["image"]);
        }
        //update
        $category->update($data);
        //session
        session()->flash("success", "data insertd successfuly");
        //return show
        return view("categories.show", ["category" => $category]);

    }
    //delete
    public function delete($id)
    {
        $category = Category::findorfail($id);
        if($category){

            Storage::delete($category->image);
        }

        $category->delete();
        session()->flash("success", "data deleted successfuly");
        return redirect(url('categories'));


    }

}