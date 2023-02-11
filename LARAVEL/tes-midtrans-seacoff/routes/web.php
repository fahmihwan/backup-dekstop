<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/coba', [TesController::class, 'index']);
Route::post('/cobba', [TesController::class, 'store']);


Route::get('/ppost', [PaymentController::class, 'payment']);
Route::post('/ppost', [PaymentController::class, 'payment']);
