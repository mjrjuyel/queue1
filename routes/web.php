<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialLoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function (){
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/add',[UserController::class,'add'])->name('add');
Route::post('/create',[UserController::class,'insert'])->name('create');
Route::get('/sendotp',[UserController::class,'sendOTP'])->name('sendotp');

// Social Login 
Route::get('/auth/{provider}/redirect',[SocialLoginController::class,'redirect']);
Route::get('/auth/{provider}/callback',[SocialLoginController::class,'callBack']);



require __DIR__.'/auth.php';
