<?php

use App\Events\MessageCreated;
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

Route::get('/', function () {

    // MessageCreated::dispatch();

    return view('welcome');
});

Route::get('/message/created', function () {
    event(new MessageCreated('fuck yout'));
});
