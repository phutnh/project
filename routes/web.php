<?php
Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
	Route::get('/many', 'HomeController@many')->name('many')->middleware('many.permission:delete,approve');
	Route::get('/one', 'HomeController@one')->name('one')->middleware('one.permission:delete,view');
});

Auth::routes();

//Admin CP
Route::group(['prefix' => 'admin/cpanel', 'namespace' => 'AdminCP', 'middleware' => 'auth'], function() {
  Route::get('/', 'DashboardController@dashboard')->name('admin.dashboard');
});

// Route test
Route::group(['prefix' => 'test'], function() {
	Route::get('home', 'TestController@index')->name('test.home');
	Route::get('table', 'TestController@table')->name('test.table');
	Route::get('form', 'TestController@form')->name('test.form');
	Route::post('ajax', 'TestController@ajax')->name('test.ajax');
});