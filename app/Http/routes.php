<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
    /*$user = App\User::find(1);
    echo $user->name;
    $role_user = \App\User::find(1);
    return $role_user->role;*/
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/admin', function(){

        return view('admin.index');
});
Route::group(['middleware' => 'admin'], function (){
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::resource('admin/categories', 'AdminCategoriesController');

});