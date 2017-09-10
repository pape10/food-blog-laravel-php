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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories','CategoryController',['except'=>['create']]);
Route::resource('tags','TagController',['except'=>['create']]);


Route::post('comments/{post_id}',['uses'=>'CommentsController@store','as'=>'comments.store']);
Route::get('comments/{id}/edit',['uses'=>'CommentsController@edit','as'=>'comments.edit']);
Route::put('comments/{id}',['uses'=>'CommentsController@update','as'=>'comments.update']);
Route::delete('comments/{id}',['uses'=>'CommentsController@destroy','as'=>'comments.destroy']);

Route::get('comments/{id}/delete',['uses'=>'CommentsController@delete','as'=>'comments.delete']);

Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
Route::get('blog',['as'=>'blog.index','uses'=>'BlogController@getIndex']);
Route::get('contact','PagesController@getContact');
Route::post('contact','PagesController@postContact');
Route::get('/','PagesController@getIndex');
Route::resource('posts','PostController');
Route::get('blogs',['uses'=>'BlogController@getSearch','as'=>'blog.search']);
Route::get('about',['uses'=>'PagesController@about','as'=>'about']);
Route::get('faq',['uses'=>'PagesController@faq','as'=>'faq']);
Route::post('addImage/{post_id}',['uses'=>'ImageController@add','as'=>'add.image']);

Route::get('blog/{slug}/images',['as'=>'blog.singleImage','uses'=>'BlogController@getSingleImage'])->where('slug','[\w\d\-\_]+');
Route::get('Image/{post_id}',['uses'=>'ImageController@seeAllForOnePost','as'=>'see.all.image']);
Route::delete('images/{id}',['uses'=>'ImageController@destroy','as'=>'images.destroy']);