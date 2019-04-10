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

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','is_admin'], 'prefix' => 'admin'],function () {
	Route::get('', 'Admin\SchoolController@index')
		->name('admin.dashboard');

	Route::get('programs', 'Admin\SchoolController@byPage')
		->name('get.schools');

	Route::get('programs/create', 'Admin\SchoolController@create')
		->name('create.program');

	Route::post('store/school', 'Admin\SchoolController@store')
		->name('store.school');

	Route::post('delete/school/{school_id}', 'Admin\SchoolController@delete')
		->name('delete.school');

	Route::post('update/school', 'Admin\SchoolController@update')
		->name('update.school');

	Route::get('school/edit/{id}', 'Admin\SchoolController@show')
		->name('show.school');

	Route::get('school/{id}/edit', 'Admin\SchoolController@edit')
		->name('edit.school');

	Route::get('subscriptions', 'Admin\SubscriptionController@byPage')
		->name('get.subscriptions');
	
	Route::post('users', 'Admin\UserController@byPage')
		->name('get.users');
});

Route::get('/register/{slug}', 'SubscriptionController@create')
	->name('create');

Route::post('/register/process', 'SubscriptionController@store')
	->name('register.process');

Route::get('/thanks', function () { 
    return view('pages.info.thank-donor');
});
Route::get('/schools/{slug}', 'HomeController@bySlug')
	->name('school');

Route::get('/schools','HomeController@byPage')	->name('schools');

Route::get('/schools/filter/{tag}', 'HomeController@byTag')
	->name('filter');

Route::post('/schools/search', 'HomeController@search')
	->name('search');

Auth::routes();
Route::get('/home', 'HomeController@index')
	->name('home');
