
<?php

/*1- craet table migration
php artisan make:migration creat_categories_table
 $table->string('title', 100);
 $table->text('desc');
 $table->string('image',255)->nullable();
php artisan migrate

2-model
php artisan make:model Category
protected $table="categories";
    protected $fillable = [
        "title",
        "desc",
        "image"
    ];

3- controller
php artisan make:controller CategoryController
public function all (){

    //category-> all

    $categories=Category::all();

4- view




*/






use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;



use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('views', [CategoryController::class, "all"]);

    //all
    Route::get('categories', [CategoryController::class, "all"]);
    //all
    Route::get('books', [BookController::class, "all"]);

Route::get('users', [UserController::class,"all"])->middleware('is_admin','auth');



////middlware

Route::middleware('guest')->group(function(){



//auth
//register
Route::get('register', [AuthController::class,'registerform']);
Route::post('register', [AuthController::class,'register']);

//loin
Route::get('login', [AuthController::class,'loginform']);
Route::post('login', [AuthController::class,'login']);

});

Route::middleware('auth')->group(function () {

//show
Route::get('/categories/show/{id}', [CategoryController::class, "show"]);
//create
Route::get('categories/create', [CategoryController::class, 'create']);
//store or post
Route::post('categories', [CategoryController::class, 'store']);
//update
//
Route::get('categories/edit/{id}',[CategoryController::class,'edit'] );
Route::put('categories/{id}', [CategoryController::class,'update'] );
//delete
Route::delete('categories/{id}', [CategoryController::class,'delete'] );

///////////////books

//show
Route::get('books/show/{id}', [BookController::class, "show"]);
//create
Route::get('books/create', [BookController::class, 'create']);
//store or post
Route::post('books', [BookController::class, 'store']);
//update
Route::get('books/edit/{id}',[BookController::class,'edit'] );
Route::put('books/{id}', [BookController::class,'update'] );
//delete
Route::delete('books/{id}', [BookController::class,'delete'] );

//logout
Route::post('logout', [AuthController::class,'logout']);

});
