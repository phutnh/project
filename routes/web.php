<?php
Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index')->name('home');
Route::get('table', 'HomeController@table')->name('table');


Route::group(['middleware' => 'auth'], function() {
	Route::get('/many', 'HomeController@many')->name('many')->middleware('many.permission:delete,approve');
	Route::get('/one', 'HomeController@one')->name('one')->middleware('one.permission:delete,view');
});

Auth::routes();

//Admin CP
Route::group(['prefix' => 'admin/cpanel', 'namespace' => 'AdminCP', 'middleware' => 'auth'], function() {
  Route::get('/', 'DashboardController@dashboard')->name('admin.dashboard');
});