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

/*
 *  Login
 */

Route::get('/', 'Auth\LoginController@index')->name('login');
Route::post('/', 'Auth\LoginController@login');
Route::get('/dang-xuat', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function (){
	Route::get('/dashboard', 'MainController@dashboard')->name('dashboard');

	Route::get('{slug}/dashboard', 'MainController@dashboardUniversity')->name('dashboard.university');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin/user', 'middleware' => ['auth','check.role']], function (){
	Route::get('/', 'UserController@index')->name('admin.user.index');

	Route::get('tao-moi', 'UserController@create')->name('admin.user.create');
	Route::post('tao-moi', 'UserController@postCreate')->name('admin.user.postCreate');

	Route::get('chinh-sua/{id}', 'UserController@edit')->name('admin.user.edit');
	Route::post('chinh-sua/{id}', 'UserController@postEdit')->name('admin.user.postEdit');

	Route::get('xoa/{id}', 'UserController@delete')->name('admin.user.delete');
});

Route::group(['namespace' => 'University', 'middleware' => ['auth', 'check.role'], 'prefix' => '{slug}'], function (){

	Route::get('edit-profile', 'UniversityController@edit')->name('university.dashboard.edit');
	Route::post('edit-profile', 'UniversityController@postEdit')->name('university.dashboard.postEdit');

	Route::group(['prefix' => 'tai-khoan'],function (){
		Route::get('/', 'UserController@index')->name('university.user.index');

		Route::get('tao-moi', 'UserController@create')->name('university.user.create');
		Route::post('tao-moi', 'UserController@postCreate')->name('university.user.postCreate');

		Route::get('chinh-sua/{id}', 'UserController@edit')->name('university.user.edit');
		Route::post('chinh-sua/{id}', 'UserController@postEdit')->name('university.user.postEdit');

		Route::get('xoa/{id}', 'UserController@delete')->name('university.user.delete');
	});

	Route::group(['prefix' => 'gioi-thieu'], function (){
		Route::get('/' , 'IntroductionController@index')->name('university.intro.index');

		Route::get('tao-moi' , 'IntroductionController@create')->name('university.intro.create');
		Route::post('tao-moi' , 'IntroductionController@postCreate')->name('university.intro.postCreate');

		Route::get('chinh-sua/{gioiThieu}', 'IntroductionController@edit')->name('university.intro.edit');
		Route::post('chinh-sua/{gioiThieu}', 'IntroductionController@postEdit')->name('university.intro.postEdit');
	});
});
