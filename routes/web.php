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
Route::group(['prefix' => '/', 'namespace' => 'Front', 'as' => 'front'], function() {
    Route::get('/', 'FrontController@getIndex');

    Route::get('property/{slug}', 'FrontController@getProperty');
});


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'auth'], function() {

    Route::get('/', 'AdminController@index');

    Route::resources([
        'properties' => 'PropertiesController'
    ]);
});

Route::get('images/{type}/{folder}/{file}', function($type, $folder, $file) {
    $path = storage_path("app/$type/$folder/$file");
    $image = Image::make($path);
    header('Content-Type: image/png');
    return $image->response();
});
