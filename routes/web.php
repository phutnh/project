<?php
Route::get('', 'HomeController@index')->name('home');
Route::get('/test', 'HomeController@test')->name('test')->middleware('can:view');

Auth::routes();

//Admin CP
Route::group(['prefix' => 'admin/cpanel', 'namespace' => 'AdminCP', 'middleware' => 'auth'], function() {
  Route::get('/', 'DashboardController@dashboard')->name('admin.dashboard');
});