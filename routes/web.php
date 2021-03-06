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

// Route::get('services', function(){
//     return 'Services page';
// });

// Route::get('user/{id}/{name}', function($id, $name){
//     return 'This is user '.$name.' with an id '.$id;
// });

// Route::get('service', function(){
//     return view('service');
// });

// Route::get('/about', function(){
//     return view('pages.about');
// });

Route::get('/', 'PagesController@index');
Route::get('/pages', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/service', 'PagesController@service');
Route::resource('posts', 'PostsController');
Route::resource('contacts', 'ContactsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
