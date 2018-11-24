<?php
Route::get('', 'AppController@index')->name('app');
Route::get('home', 'HomeController@index')->name('home');
Route::get('table', 'HomeController@table')->name('table');


Route::group(['middleware' => 'auth'], function() {
	Route::get('/test', 'HomeController@test')->name('test')->middleware('permission:delete');
});

Auth::routes();

//Admin CP
Route::group(['prefix' => 'admin/cpanel', 'namespace' => 'AdminCP', 'middleware' => 'auth'], function() {
  Route::get('/', 'DashboardController@dashboard')->name('admin.dashboard');
});