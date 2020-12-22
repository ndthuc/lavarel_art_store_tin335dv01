<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\DB;
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
    return view('home.admin');
});

Route::get('/check_fail', function (){
    echo "check_fail page";
    return view('home.admin');
});
Route::get('/check_age/{age?}', function ($age) {
    echo $age;
    $users = DB::table('users')->get();
    return view('user.listUser',  ['users' => $users]);
})->middleware(\App\Http\Middleware\CheckAge::class);

Route::resource('users', UserController::class)->middleware(['auth','role:Admin']);
Route::resource('products', ProductController:: class)->middleware(['auth','role:Editor,Admin']);
Route::resource('orders', OrderController:: class)->middleware(['auth','role:Editor,Admin']);
Route::resource('categories', CategoryController:: class)->middleware(['auth','role:Editor,Admin']);

Route::resource('profiles', ProfileController::class)
    ->middleware(['auth','role:Admin'])
    ->only(['create', 'store', 'edit', 'update', 'destroy']);
Route::resource('profiles', ProfileController::class)
    ->middleware(['auth'])
    ->only(['show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/filter',[App\Http\Controllers\OrderController::class,'filter'])->name('filter')->middleware(['auth','role:Editor,Admin']);
