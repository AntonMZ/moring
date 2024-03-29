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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::any('/logout', 'Auth\LoginController@logout')->name('auth.logout');
Route::get('/checks/sites', 'ChecksSitesController@getIndex')->name('checks.sites.getIndex');

$groupData = [
    'namespace' => 'Admin\Sites',
    'prefix' => 'admin'
];

Route::group($groupData, function () {
    $methods = ['index', 'create', 'store', 'edit', 'update', 'destroy'];
    Route::resource('sites', 'SitesController')
        ->only($methods)
        ->names('admin.sites');
});

Route::group(['prefix' => 'settings', 'namespace' => 'Admin\Sites','as' => 'settings.'], function () {
    $methods = ['index', 'create', 'store', 'edit', 'update', 'destroy','show'];
    Route::resource('users', 'UsersController')
        ->only($methods);
});