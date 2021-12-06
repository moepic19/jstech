<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\AdminController;
use  App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


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
    return view('welcome');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function (){
    Auth::routes();
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin'=>'auth','PreventBackHistory']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'index'])->name('admin.profile');
    Route::get('setting',[AdminController::class,'index'])->name('admin.setting');

});

Route::group(['prefix'=>'user', 'middleware'=>['isUser'=>'auth','PreventBackHistory']], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    //Route::get('profile',[UserController::class,'index'])->name('user.profile');
    Route::get('setting',[UserController::class,'index'])->name('user.setting');
    //Route::get('add',[UserController::class,'index'])->name('user.add');
    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');

});

Route::get('/add', function () {
   return view('dashboard/user/add');
});

Route::get('/profile', function () {
    return view('dashboard/user/profile');
});

Route::post('profile/store','UserProfileController@store')->name('profile.store');
