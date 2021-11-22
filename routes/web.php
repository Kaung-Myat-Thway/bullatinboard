<?php


use App\Http\Controllers\UserController;

use App\Models\User;

use Illuminate\Support\Facades\Route;
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
    return view('auth/login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/user', 'UserController');
Route::post('users/confirm', 'UserController@confirm')->name('user.confirm');
Route::post('/update_confirm', 'UserController@update_confirm')->name('user.update_confirm');
Route::get('/usersearch', 'UserController@search')->name('user.search');

Route::resource('/post', 'PostController');
Route::post('posts/confirm', 'PostController@confirm')->name('post.confirm');
Route::post('posts/update_confirm', 'PostController@update_confirm')->name('post.update_confirm');
Route::get('/search', 'PostController@search')->name('post.search');

//Excel export/import route
Route::get('/export', 'PostController@export')->name('export');
Route::get('/excel', 'PostController@importExportView');
Route::post('/import', 'PostController@import')->name('import');

Route::get('/contact','ContactController@contact');
Route::post('/contact','ContactController@contactSubmit')->name('contact.submit');




// Route::post('test',  function () {
//     $user = User::where('id', 1)->deleted()->notProfile()->first();
// });

// Route::post('post',  function () {
//     $post = Post::select(
//         'title',
//         'description',
//         'status'
//     )->whereNull("deleted_at");
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

