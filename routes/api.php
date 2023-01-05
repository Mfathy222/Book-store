<?php


use App\Http\Controllers\ApiAuthCotroller;
use App\Http\Controllers\ApiCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', [ApiCategoryController::class, 'all']);

Route::get('/categories/show/{id}', [ApiCategoryController::class, 'show']);

Route::post('/categories/create', [ApiCategoryController::class, 'store'])->middleware('api_auth');
Route::post('/categories/update/{id}', [ApiCategoryController::class, 'update'])->middleware('api_auth');
Route::delete('/categories/delete/{id}', [ApiCategoryController::class, 'delete'])->middleware('api_auth');


///auth

Route::post('register', [ApiAuthCotroller::class, 'register']);
Route::post('login', [ApiAuthCotroller::class, 'login']);
Route::post('logout', [ApiAuthCotroller::class, 'logout'])->middleware('api_auth');



