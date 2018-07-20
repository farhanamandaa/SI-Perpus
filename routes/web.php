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
    return view('layout.403');
});


Auth::routes();

Route::group(['prefix' => 'user'], function(){
	Route::get('/home', 'HomeController@index')->name('user.home');
	Route::get('/books', 'HomeController@show')->name('user.list.book');
	Route::get('/books/{book}', 'HomeController@showDetails')->name('user.show.detail');
	Route::get('/borrowing_list', 'HomeController@borrowList')->name('user.borrowing.list');
	Route::get('/profile', 'UsersProfileController@index')->name('user.profile');
	Route::post('/profile', 'UsersProfileController@store')->name('user.update.profile');
});


Route::group(['prefix' => 'admin'], function(){
	Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
	Route::get('/', 'Admin\HomeController@index')->name('admin.home');
	Route::get('/user_list', 'Admin\AddUserController@index')->name('admin.list.user');
	Route::get('/add_user', 'Admin\AddUserController@create')->name('admin.add.user');
	Route::post('/add_user', 'Admin\AddUserController@store')->name('admin.store.user');
	Route::get('/categories', 'Admin\BookCategoriesController@index')->name('admin.book.categories');
	Route::post('/categories', 'Admin\BookCategoriesController@store')->name('admin.add.categories');
	Route::get('/add_book', 'Admin\AddBookController@index')->name('admin.book');
	Route::post('/add_book', 'Admin\AddBookController@store')->name('admin.add.book');
	Route::get('/add_borrowing', 'Admin\AddBorrowingController@create')->name('admin.add.borrowing');
	Route::post('/add_borrowing', 'Admin\AddBorrowingController@store')->name('admin.store.borrowing');
	Route::get('/borrowing_list', 'Admin\AddBorrowingController@index')->name('admin.borrowing.list');
	Route::get('/end/{id}', 'Admin\AddBorrowingController@destroy')->name('admin.end.borrowing');
	Route::get('/returning_list', 'Admin\AddBorrowingController@showReturn')->name('admin.returning.list');
});
