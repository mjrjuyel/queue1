<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\Spatie\RoleController;
use App\Http\Controllers\Spatie\PermissionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function (){
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Role Permission Route

// Permisioni Route
Route::get('permission',[PermissionController::class,'index'])->name('permission');
Route::get('permission/add',[PermissionController::class,'create'])->name('permission.create');
Route::post('permission/insert',[PermissionController::class,'insert'])->name('permission.insert');
Route::get('permission/edit/{id}',[PermissionController::class,'edit'])->name('permission.edit');
Route::put('permission/update/{id}',[PermissionController::class,'update'])->name('permission.update');
Route::delete('permission/delete/{id}',[PermissionController::class,'delete'])->name('permission.delete');

// Permisioni Route
Route::get('role',[RoleController::class,'index'])->name('role');
Route::get('role/add',[RoleController::class,'create'])->name('role.create');
Route::post('role/insert',[RoleController::class,'insert'])->name('role.insert');
Route::get('role/edit/{id}',[RoleController::class,'edit'])->name('role.edit');
Route::put('role/update/{id}',[RoleController::class,'update'])->name('role.update');
Route::delete('role/delete/{id}',[RoleController::class,'delete'])->name('role.delete');

// Add Permission To role
Route::get('getPerRole/create/{id}',[RoleController::class,'AddPermission'])->name('getPerRole.create');
Route::post('getPerRole/insert',[RoleController::class,'insertPermission'])->name('getPerRole.insert');
Route::get('getPerRole/edit/{id}',[RoleController::class,'edit'])->name('getPerRole.edit');
Route::put('getPerRole/update/{id}',[RoleController::class,'update'])->name('getPerRole.update');
Route::delete('getPerRole/delete/{id}',[RoleController::class,'delete'])->name('getPerRole.delete');

// Add User
Route::get('user',[UserController::class,'index'])->name('user');
Route::get('user/create',[UserController::class,'create'])->name('user.create');
Route::post('user/insert',[UserController::class,'store'])->name('user.insert');
Route::get('user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
Route::put('user/update',[UserController::class,'update'])->name('user.update');
Route::delete('user/delete/{id}',[UserController::class,'delete'])->name('user.delete');


Route::get('/add',[UserController::class,'add'])->name('add');
Route::post('/create',[UserController::class,'insert'])->name('create');
Route::get('/sendotp',[UserController::class,'sendOTP'])->name('sendotp');

// Social Login 
Route::get('/auth/{provider}/redirect',[SocialLoginController::class,'redirect']);
Route::get('/auth/{provider}/callback',[SocialLoginController::class,'callBack']);



require __DIR__.'/auth.php';
