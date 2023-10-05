<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});
//user hna kay3ni link ya3ni http://127.0.0.1:8000/user
Route::resource('user', UserController::class);