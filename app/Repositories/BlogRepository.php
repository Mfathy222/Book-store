<?php

namespace App\Repositories;

use App\Models\Category;
use App\User;
use App\Repositories\Interfaces\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface
{
    public function show($id){
        //هنا بنكلم الموديل بنقوله اوجد لي ال id وحطه في متغير
        $category = Category::findorfail($id);

        //هنا بعتنا المتغير فيىه compact علشان نعرضها في صفحه الshow
        return view("categories.show", compact("category"));
   }
}