<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','LoginController@login')->name('login');

Route::get('login','LoginController@login')->name('login');
Route::post('do-login','LoginController@doLogin')->name('do.login');
Route::get('admin/login','AdminController@login')->name('admin.login');
Route::post('admin/do-login','AdminController@doLogin')->name('admin.do.login');
Route::get('admin/users','AdminController@homePage')->name('admin.home');
Route::group(['middleware'=>'user_auth'],function(){
    Route::get('logout','LoginController@logout')->name('logout');
    Route::get('users','FrontendController@homePage')->name('home');//->middleware('user_auth');
    Route::get('new-user','FrontendController@create')->name('create.user');
    Route::post('save-user','FrontendController@save')->name('save.user');
    Route::get('view-user/{userid}','FrontendController@view')->name('view.user');
    Route::get('edit-user/{userid}','FrontendController@edit')->name('edit.user');
    Route::post('update-user','FrontendController@update')->name('update.user');
    Route::get('delete-user/{userid}','FrontendController@delete')->name('delete.user');
    Route::get('activate-user/{userid}','FrontendController@activate')->name('activate.user');
    Route::get('force-delete-user/{userid}','FrontendController@forceDelete')->name('force.delete.user');
    Route::get('about-us','FrontendController@aboutUs')->name('about');
    Route::get('contact-us','FrontendController@contactUs')->name('contact');
});
