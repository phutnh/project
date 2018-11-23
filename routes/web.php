<?php
Route::get('', 'HomeController@index')->name('home');
Route::get('/test', 'HomeController@test')->name('test')->middleware(['permission:administrator,view', 'auth']);

Auth::routes();

//Admin CP
Route::group(['prefix' => 'admin/cpanel', 'namespace' => 'AdminCP', 'middleware' => 'auth'], function() {
  Route::get('/', 'DashboardController@dashboard')->name('admin.dashboard');
});