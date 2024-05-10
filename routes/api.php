<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\RootController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});

Route::get('/books',[BookController::class,'index']);
Route::post('/searchbook', [BookController::class,'qbook']);
Route::get('/book/{id}',[BookController::class,'show']);
Route::get('/categories',[CategoryController::class,'index']);
Route::get('/maincategories',[RootController::class,'index']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/favorites/{id}',[UserController::class,'index']);
    Route::post('/add', [FavoriteController::class, 'add']);
    Route::delete('/remove', [FavoriteController::class, 'remove']);
    Route::post('/store', [RatingController::class, 'store']);
    Route::delete('/delete', [RatingController::class, 'remove']);
    Route::get('/ratings', [RatingController::class, 'index']);
});
