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

Pour lancer le projet : php artisan serve

*/

use App\Http\Middleware\isAdmin;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

//ici , tout les url qui commencent par article auron article controller //

Route::resource('article', 'ArticleController');

Route::get('/user', 'HomeController@indexhome');

Route::resource('/contact', 'ContactController');

Route::post('article/{id}/comment', [
    'as'   => 'article.comment',
    'uses' => 'ArticleController@postComment'
]);



Route::delete('article/{id}/comment', [
    'as'   => 'article.destroyCom',
    'uses' => 'ArticleController@destroyCom'
]);
Route::get('/admin', 'AdminController@adminhome')->middleware(isAdmin::class);
Route::get('/admin/show/{id}', 'AdminController@show')->middleware(isAdmin::class);
Route::get('/admin/articles', 'AdminController@articlesAdmin')->middleware(isAdmin::class);
Route::get('/admin/userlist', 'AdminController@userAdmin')->middleware(isAdmin::class);

Route::delete('/admin/userlist/{id}', [
    'as'   => 'admin.destroyUser',
    'uses' => 'AdminController@destroyUser'
])->middleware(isAdmin::class);

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

Route::get('imageUploadForm', 'ImageController@upload' );

Route::post('imageUploadForm', 'ImageController@store' );

Route::get('showLists', 'ImageController@show' );


Route::get('profile', 'UserController@profile');
//Route::post('profile', 'UserController@update_avatar');
Route::post('profile/avatar', 'UserController@update_avatar')->name('profile.avatar');
Route::put('profile', 'UserController@update')->name('profile.update');





