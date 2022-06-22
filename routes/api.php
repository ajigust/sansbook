<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\UserListController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\User;
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

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
// Route::post('user', [UserController::class, 'getAuthenticatedUser']);
// Route::post('logout', [UserController::class, 'logout']);



// Route::group(['middleware' => 'jwt.auth'], function () {
//     Route::get('user', [UserController::class, 'getAuthenticatedUser']);
//     Route::post('logout', [UserController::class, 'logout']);

//     Route::get('books', [BookController::class, 'index']);
//     Route::get('books/show/{id}', [BookController::class, 'show']);
//     Route::post('books/store', [BookController::class, 'store']);
//     Route::post('books/update/{id}', [BookController::class, 'update']);
//     Route::post('books/destroy/{id}', [BookController::class, 'destroy']);

//     Route::get('userlist', [UserListController::class, 'index']);
//     Route::get('userlist/{id}', [UserListController::class, 'show']);
// });

Route::get('books', [BookController::class, 'index']);
Route::get('books/show/{id}', [BookController::class, 'show']);
Route::post('books/store', [BookController::class, 'store']);
Route::put('books/update/{id}', [BookController::class, 'update']);
Route::delete('books/destroy/{id}', [BookController::class, 'destroy']);

Route::get('userlist', [UserListController::class, 'index']);
Route::get('userlist/show/{id}', [UserListController::class, 'show']);
Route::delete('userlist/destroy/{id}', [UserListController::class, 'destroy']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
