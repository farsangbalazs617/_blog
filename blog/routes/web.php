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

Route::get('/', 'LoginController@goToHome');

Route::post('/checklogin', 'LoginController@checklogin');
Route::get('/home', 'HomeController@index') -> middleware('login');
Route::get('/regist', 'RegistController@index');
Route::post('/doregist', 'RegistController@register');
Route::get('/home/logout', 'HomeController@logout')    -> middleware('login');
Route::get('/home/addblog', 'BlogController@addBlogIndex') -> middleware('login');
Route::post('/home/addblog/add', 'BlogController@add') -> middleware('login');
Route::get('home/myblogs', 'BlogController@showOwnBlogs') ->middleware('login');
Route::get('home/myblogs/delete/{id}', 'BlogController@deleteBlog')->middleware('login');
Route::get('home/myblogs/{id}', 'BlogController@editIndex')->middleware('login');
Route::post('home/myblogs/edit', 'BlogController@editBlog')->middleware('login');
Route::post('home/addblog/showlabels', 'LabelController@showLabels')->middleware('login');
Route::post('home/addblog/uploadlabels', 'LabelController@uploadLabels')->middleware('login');
Route::get('home/search', 'HomeController@search')->middleware('login');


