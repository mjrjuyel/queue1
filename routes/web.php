<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('create',[UserController::class,'add']);
Route::post('insert',[UserController::class,'insert'])->name('create');
Route::get('timezone',function(){
    collect(timezone_identifiers_list());

    return  $timeZone = config('app.timezone');
});