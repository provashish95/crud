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

//Route::get('/', function () {
//    return view('pages.index');
//});

Route::get('/', 'AboutController@index');

Route::get(md5('/about'), 'AboutController@about')->name('about');
Route::get(md5('/contact'), 'AboutController@contact')->name('contact');

//Category crud are here.......
Route::get(md5('add/category'), 'PostController@AddCategory')->name('add.category');
Route::post(md5('store/category'), 'PostController@StoreCategory')->name('store.category');
Route::get(md5('all/category'), 'PostController@AllCategory')->name('all.category');
Route::get('view/category/{id}', 'PostController@ViewCategory');
Route::get('delete/category/{id}', 'PostController@DeleteCategory');
Route::get('edit/category/{id}', 'PostController@EditCategory');
Route::post('update/category/{id}', 'PostController@UpdateCategory');
//Post CRUD are here...........
Route::get(md5('write/post'), 'PostAddController@WritePost')->name('write.post');
Route::post(md5('store/post'), 'PostAddController@StorePost')->name('store.post');
Route::get(md5('all/post'), 'PostAddController@AllPost')->name('all.post');
Route::get('view/post/{id}', 'PostAddController@ViewPost');
Route::get('edit/post/{id}', 'PostAddController@editPost');
Route::post('update/post/{id}', 'PostAddController@UpdatePost');
Route::get('delete/post/{id}', 'PostAddController@DeletePost');

//student.....
Route::get(md5('/student'), 'StudentController@Student')->name('student');

Route::post(md5('store/student'), 'StudentController@StoreStudent')->name('store.student');
Route::get(md5('all/student'), 'StudentController@AllStudent')->name('all.student');
Route::get('view/student/{id}', 'StudentController@ViewStudent');
Route::get('delete/student/{id}', 'StudentController@DeleteStudent');
Route::get('edit/student/{id}', 'StudentController@EditStudent');
Route::post('update/student/{id}', 'StudentController@UpdateStudent');



