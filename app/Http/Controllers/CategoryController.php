<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Interfaces\BlogRepositoryInterface;


class CategoryController extends Controller
{
    public function all()
    {

        //category-> all
        // paginatation
        //1-all or get -> paginate()
        //2- page all $category->links()
        //Category دا اسم الموديل
        //$categories بيحتوى علي كل العواميد الي في الموديل
        //paginate دا كلاس بيعمل بجينات ونحدد معاه يعرض اد ايه
        $categories = Category::paginate(2);


        //view
        //categories.all اسم الصفحه الموجود في فولدر
        //compact("هنا اسم المتغير الي فيه الداتا")
        return view("categories.all", compact("categories"));
    }


    private $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }
    public function show($id){
         //هنا بنكلم الموديل بنقوله اوجد لي ال id وحطه في متغير
        //  $category = Category::findorfail($id);

        //  //هنا بعتنا المتغير فيىه compact علشان نعرضها في صفحه الshow
        //  return view("categories.show", compact("category"));
    }


    //create
    public function create()
    {
        return view('categories.create');
    }
    //store or post
// Request بتبقي شايله كل الداتا الي انا دخلتها في الفورم علشان امسك الداتا
//$request كده اخدنا منه object
//هاعمل عليه فالديشن واحفظه في متغير$data
//لو الفالديشن تمام هاخزن في الcategory model
// وهارجع علي الرئيسيه
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
        );

        session()->flash("success", "date insertd successfuly");

        //route

        return redirect(url('categories'));


    }
    //update or edit
    public function edit($id)
    {
//هنا محتاج الداتا الي موجوده فاهبعتا كده
        $category = Category::findorfail($id);
//كده هاروح لصفحه الايديت ومعاها الداتا في المتغير
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
// return redirect()->action([CategoryController::class,'all']);

    }

}