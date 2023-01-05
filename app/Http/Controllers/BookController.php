<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function all()
    {

        //category-> all
        // paginatation
        //1-all or get -> paginate()
        //2- page all $category->links()
        $books = Book::paginate(2);


        //view
        return view("books.all")->with("books", $books);
    }
    //show
    public function show($id)
    {
        $book = book::findorfail($id);
        return view("books.show", compact("book"));
    }
    public function create()
    {
        $categories=Category::all();
        return view('books.create',["categories"=>$categories]);
    }
    //store or post


    public function store(Request $request)
    {

        //validation

        $data = $request->validate(
            [
                "title" => 'required|string|max:100',
                "desc" => 'required|string',
                "image"=>'required|image|mimes:png,jpg,jpeg,Gif',
                "price"=>'required|numeric',
                "category_id"=>"required|exists:categories,id"
            ]
        );

       // uplode image and store image in dd
        $data['image']=Storage::putFile("books", $data['image']);


        $data['user_id'] = 1;

        //store
        Book::create(
            $data
            //     [
            //     "title" => $request->title,
            //     "desc" => $request->desc,
            // ]
        );

        session()->flash("success", "date insertd successfuly");

        //route

    return redirect(url('books'));


    }


    //update or edit
    public function edit($id){

        $book = Book::findorfail($id);
        $categories= Category::all();


        return view('books.edit',["book"=>$book, "categories"=>$categories]);
}


//update
public function update($id,Request $request){

//validtion
$data = $request->validate(
    [
        "title" => 'required|string|max:100',
        "desc" => 'required|string',
        "image"=>'image|mimes:png,jpg,jpeg',
        "price"=>'required|numeric',
        "category_id"=>"required|exists:categories,id"
    ]
);

//check
$book = Book::findorfail($id);

if($request->has('image')){
            Storage::delete($book->image);
            $data['image']=Storage::putFile("books", $data["image"]);
}
//update
        $book->update($data);
//session
 session()->flash("success", "data insertd successfuly");
//return show
        return view("books.show",["book"=>$book]);

}

//delete
public function delete ($id){
    $book = Book::findorfail($id);

            Storage::delete($book->image);




    $book->delete();
    session()->flash("success", "data deleted successfuly");
            return redirect()->action([BookController::class,"all"]);
    }
}