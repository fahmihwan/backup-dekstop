<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\TweetController;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function () {
    Route::post('/user/login', 'login');
    Route::post('/user/register', 'register');
    Route::post('/user/logout', 'logout');
    Route::post('/user/refresh', 'refresh');
});

// $this->middleware('auth:api', ['except' => ['index']]);
Route::get('/tweet', [TweetController::class, 'index']);
Route::middleware('auth:api')->group(function () {
    Route::post('/tweet', [TweetController::class, 'store']);
    Route::delete('/tweet/{tweet}', [TweetController::class, 'destroy']);
});


Route::get('/like', [LikeController::class, 'index']);
Route::post('/like', [LikeController::class, 'store']);
Route::get('/like/list', [LikeController::class, 'my_like']);


Route::get('/comment', [CommentController::class, 'index']);
Route::post('/comment', [CommentController::class, 'store']);
Route::delete('/comment/{comment}', [CommentController::class, 'destroy']);
// Route::middleware(['auth'])->group(function () {
// });
