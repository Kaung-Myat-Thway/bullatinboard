<?php

<<<<<<< HEAD
use App\Http\Controllers\UserController;
=======
use App\User;
>>>>>>> 1bc5be33bebbcdf0323ab80bfc8b50883e1c631b
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
    return view('auth/login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/user','UserController');
Route::post('users/confirm','UserController@confirm')->name('user.confirm');


//test route for blade design
Route::get('/test',function(){
    return view('users/update');
});

Route::get('/test2',function(){
    return view('users/update_confirm');
});

Route::get('/profile',function(){
    return view('users/profile');
Route::resource('/user', 'UserController');
Route::post('users/confirm', 'UserController@confirm')->name('user.confirm');
Route::post('test',  function () {
    $user = User::where('id', 1)->deleted()->notProfile()->first();
});
