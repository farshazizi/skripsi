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

Route::get('/test', function () {
    return view('test');
});

Route::get('/perubahan', function () {
    return view('perubahan');
});

Route::get('/', function () {
    return view('pages/welcome');
});

Route::resource('/pages/welcome', 'SubscribeController');

Route::get('process', function () {
    return view('pages/process');
});

Route::get('gallery', function () {
    return view('pages/gallery');
});

// Route::resource('/daftar', 'DaftarController');
Route::get('/daftar', 'DaftarController@create');
Route::post('/daftar', 'DaftarController@store')->name('daftar.store');

// RESET PASSWORD
// Route::get('password/email/{token?}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/email', 'Auth\ResetPasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
// END RESET PASSWORD

// ADMIN
Route::get('/admin/dashboard', function () {
    return view('/admin/pages/dash');
});
Route::resource('/admin/user', 'DaftarController');
Route::get('/admin/match', 'Registration1Controller@index');
Route::resource('/admin/match', 'Registration1Controller');
// Route::get('/admin/match/{nama_lengkap}', 'Registration1Controller@calculate');
// Route::resource('/admin/match', 'Registration2Controller');
// Route::resource('/admin_perhitungan', 'Registration1Controller');
// Route::get('/admin_detail', 'Registration1Controller@show');
// END ADMIN

// USER
Route::group(['middleware' => 'auth'], function() {

	// Route::auth();

	// Route::get('home', function () {
	//     return view('home');
	// });
	Route::get('/home', 'HomeController@index')->name('home');

	// Route::group(['middleware' => ['web']], function() {

	// Route::resource('/registration1', 'Registration1Controller');
	Route::get('/registration', 'Registration1Controller@create');
	Route::post('/registration', 'Registration1Controller@store')->name('registration.store');

	//Route::resource('/registration2', 'Registration2Controller');
	Route::get('/registration/2', ['as' => 'registration2', 'uses' => 'Registration2Controller@create']);
	Route::post('/registration/2', 'Registration2Controller@store')->name('registration2.store');

	// Route::resource('/registration3', 'Registration3Controller');
	Route::get('/registration/3', ['as' => 'registration3', 'uses' => 'Registration3Controller@create']);
	Route::post('/registration/3', 'Registration3Controller@store')->name('registration3.store');

	// Route::resource('/registration4', 'Registration4Controller');
	Route::get('/registration/4', ['as' => 'registration4', 'uses' => 'Registration4Controller@create']);
	Route::post('/registration/4', 'Registration4Controller@store')->name('registration4.store');

	// Route::resource('/registration5', 'Registration5Controller');
	// Route::get('/registration/5', ['as' => 'registration5', 'uses' => 'Registration5Controller@create']);
	// Route::post('/registration/5', 'Registration5Controller@store')->name('registration5.store');

	// Route::resource('/registration6', 'Registration6Controller');
	// Route::get('/registration/6', ['as' => 'registration6', 'uses' => 'Registration6Controller@create']);
	// Route::post('/registration/6', 'Registration6Controller@store')->name('registration6.store');

	// Route::resource('/registration7', 'Registration7Controller');
	Route::get('/registration/7', ['as' => 'registration7', 'uses' => 'Registration7Controller@create']);
	Route::post('/registration/7', 'Registration7Controller@store')->name('registration7.store');
	 // Route::get('registration/7', ['uses' => 'Registration7Controller@show', 'as' => 'registration/7']);

	// Route::resource('/registration8', 'Registration8Controller');
	Route::get('/registration/8', ['as' => 'registration8', 'uses' => 'Registration8Controller@create']);
	Route::post('/registration/8', 'Registration8Controller@store')->name('registration8.store');
	// });
	Route::get('wait', function () {
	    return view('form/waiting');
	});

});

Auth::routes();
// END USER
