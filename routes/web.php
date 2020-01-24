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

Route::get('/', function () {
    return view('pages.index');
});
Route::get(md5('/about'), 'AboutController@about')->name('about');
Route::get(md5('/contact'), 'AboutController@contact')->name('contact');

Route::get(md5('write/post'), 'PostController@WritePost')->name('write.post');

//Category crud are here.......
Route::get(md5('add/category'), 'PostController@AddCategory')->name('add.category');
Route::post(md5('store/category'), 'PostController@StoreCategory')->name('store.category');


Route::get(md5('all/category'), 'PostController@AllCategory')->name('all.category');

