<?php

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
		return view('home.index');
	});
Route::get('admin', 'UserController@getLogin');

Route::post('admin', 'UserController@postLogin');

Route::get('password', 'UserController@getpassworld');

Route::get('posts', 'UserController@getposts');

Route::group(['prefix' => 'admin'], function () {

		Route::get('logo', 'UserController@getlogo');

		Route::post('logo', 'UserController@postlogo');

		Route::get('menu', 'UserController@getmenu')->name('menuheader');

		Route::post('menu', 'UserController@postmenu');

		Route::get('menu/{id}/edit', 'UserController@getidmenus')->name('menu.edit');

		Route::get('menu/delete', 'UserController@getidmenusdelete')->name('menu.delete');

		Route::get('socialheader', 'UserController@getsocialheader')->name('socialheader');

		Route::post('socialheader', 'UserController@postsocialheader');

		Route::get('socialheader/{id}/edit', 'UserController@getidsocial')->name('socialheader.edit');

		Route::get('socialheader/delete', 'UserController@getidsocialdelete')->name('socialheader.delete');

		Route::get('slideshow', 'UserController@getslideshow')->name('slideshow');

		Route::post('slideshow', 'UserController@postslideshow');

		Route::get('slideshow/delete', 'UserController@getidslideshowdelete')->name('slideshow.delete');

		Route::get('about', 'UserController@getabout')->name('about');

		Route::post('about', 'UserController@postabout');

		Route::get('about/{id}/edit', 'UserController@getidabout')->name('about.edit');

		Route::get('about/delete', 'UserController@getidaboutdelete')->name('about.delete');

	});
