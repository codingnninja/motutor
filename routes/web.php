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
	Route::get('', 'Admin\AdminController@index')
		->name('admin.dashboard');

	Route::get('students', 'Admin\StudentController@byPage')
		->name('get.students');

	Route::get('staff', 'Admin\StaffController@byPage')
		->name('get.staff');

	Route::get('parents', 'Admin\ParentController@byPage')
		->name('get.parents');

	Route::get('student/create', 'Admin\SchoolController@create')
		->name('create.program');

	Route::get('school', 'Admin\SchoolController@create')
		->name('create.school');

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

	// Routing for subject
	Route::get('/subjects', 'Admin\SubjectController@byPage')
		->name('subjects');
		
	Route::post('/subject/store', 'Admin\SubjectController@store')
		->name('store.subject');

	// Routing for subject
	Route::get('/classes', 'Admin\ClassController@byPage')
	->name('classes');
	
	Route::post('/class/store', 'Admin\ClassController@store')
	->name('store.class');
});

// Routing for subscription

Route::get('/register/{slug}', 'SubscriptionController@create')
	->name('create');

Route::post('/register/process', 'SubscriptionController@store')
	->name('register.process');

Route::get('/thanks', function () { 
    return view('pages.info.thank-donor');
});

//Routing for schools
Route::get('/schools/{slug}', 'HomeController@bySlug')
	->name('school');

Route::get('/schools','HomeController@byPage')	
	->name('schools');

Route::get('/schools/filter/{tag}', 'HomeController@byTag')
	->name('filter');

Route::post('/schools/search', 'HomeController@search')
	->name('search');

//Routing for users
Route::get('/teacher', 'UserController@index')
	->name('dashboard');

Route::get('/profile/{id}', 'UserController@byId')
	->name('profile');

Route::get('/profiles', 'UserController@byPage')
	->name('profiles');

Route::get('/profile/edit/{id}', 'UserController@edit')
	->name('edit');

Route::post('/profile/update', 'UserController@update')
	->name('update');

Route::post('/profile/store', 'UserController@store')
	->name('store');

//Routing for teacher

Route::get('/teacher/subjects', 'TeacherController@subjects')
	->name('byPage');

Route::get('/teacher/classes', 'TeacherController@class')
	->name('display.classes');

Route::get('/teacher/classes/{class_id}', 'TeacherController@studentsInClass')
	->name('students.in.classe');

Route::get('/teacher/subject/students', 'TeacherController@studentsForSubject')
	->name('students.in.classe');

Route::get('/teacher/classes/score/{user_id}', 'ScoreController@record')
	->name('students.in.classe');

Route::get('/teacher/subjects/{subject_id}', 'Admin\SubjectController@topics')
	->name('topics');
	
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
