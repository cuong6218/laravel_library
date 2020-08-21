<?php

use Illuminate\Support\Facades\Route;

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
//    return view('welcome');
//});
Route::get('locales/{lang}', 'Locale@index');
Route::middleware('checkLang')->prefix('admin')->group(function ()
{
    Route::get('login', 'AuthController@showLogin')->name('auth.showLogin');
    Route::post('login', 'AuthController@login')->name('auth.login');
    Route::get('logout', 'AuthController@logout')->name('auth.logout');
        Route::middleware('checkLogin')->prefix('dashboard')->group(function ()
        {
            Route::get('/', 'LayoutController@index')->name('dashboard.index');
            Route::get('/{locale}/change-language','LayoutController@changeLanguage')->name('dashboard.changeLanguage');
        });
    Route::get('/grade-back', 'GradeController@back')->name('grades.back');
    Route::resource('grades', 'GradeController');
        Route::get('/student-back', 'StudentController@back')->name('students.back');
        Route::resource('students', 'StudentController');
    Route::get('/card-back', 'CardController@back')->name('cards.back');
    Route::get('/{id}/return', 'CardController@bookReturn')->name('cards.bookReturn');
    Route::get('/return-list', 'CardController@getReturn')->name('cards.getReturn');
    Route::post('/borrow-book', 'CardController@borrow')->name('cards.borrow');
    Route::resource('cards', 'CardController');
        Route::get('/type-back', 'TypeController@back')->name('types.back');
        Route::resource('types', 'TypeController');
    Route::get('/book-back', 'BookController@back')->name('books.back');
    Route::get('/book-search', 'BookController@search')->name('books.search');
    Route::resource('books', 'BookController');
        Route::get('/user-back', 'UserController@back')->name('users.back');
        Route::resource('users', 'UserController');
    Route::get('/product-back', 'ProductController@back')->name('products.back');
    Route::resource('products', 'ProductController');
});

Route::prefix('shop')->group(function ()
{
    Route::get('/login', 'HomeController@showLogin')->name('shop.showLogin');
    Route::get('/register', 'HomeController@showRegister')->name('shop.showRegister');
    Route::get('/', 'HomeController@index')->name('shop.index');
    Route::get('/{id}/add-to-cart', 'ProductController@getAddToCart')->name('products.addToCart');
    Route::get('/shopping-cart', 'ProductController@getCart')->name('products.shoppingCart');
    Route::get('/checkout', 'ProductController@checkout')->name('products.checkout');
});
