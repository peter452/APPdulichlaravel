<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//-----------------------------USER------------------------

Route::group(['prefix'=>'User'],function(){

	Route::get('getData','UserController@getData');

	Route::get('getNameUser','UserController@getNameUser');

	Route::post('register','UserController@register')->name('register');

	Route::post('login','UserController@login')->name('login');

	Route::post('updatePass','UserController@updatePass');

	Route::post('updateUser','UserController@updateUser');

});

//------------------------------MENU-----------------------

Route::group(['prefix'=>'Menu'],function(){

	Route::get('getDataMenuTop','MenuController@getDataMenuTop');

	Route::get('getDataMenuBottom','MenuController@getDataMenuBottom');

	Route::get('getDataMenuAll','MenuController@getDataMenuAll');


});

//------------------------------EVENT----------------------

Route::group(['prefix'=>'Event'],function(){

	Route::get('getDataEventRanDom','EvenController@getDataEventRanDom');

});

//------------------------------PLACE-----------------------

Route::group(['prefix'=>'Place'],function(){

	Route::get('getDataPlaceHomeRandom','PlaceController@getDataPlaceHomeRandom');

	Route::get('getDataImageHomeRandom','PlaceController@getDataImageHomeRandom');

	Route::get('getDataPlaceIdIngredient','PlaceController@getDataPlaceIdIngredient');

	Route::get('getDataPlaceIdPlace','PlaceController@getDataPlaceIdPlace');

	Route::get('getDataPlaceStrSearch','PlaceController@getDataPlaceStrSearch');

	Route::get('getLatLngPlace','PlaceController@getLatLngPlace');

	Route::get('getDataPlaceIdMenu','PlaceController@getDataPlaceIdMenu');
});

//----------------------------INGREDIENT----------------------

Route::group(['prefix'=>'Ingredient'],function(){

	Route::get('getDataIngredientIdMenu/id_menu={id}','ingredientController@getData');	

});

//----------------------------EVALUATE-------------------------

Route::group(['prefix'=>'Evaluate'],function(){

	Route::post('postLikePlace','EvaluateController@postLikePlace');
});

//----------------------------COMMENT POSTS-------------------------

Route::group(['prefix'=>'CommentPost'],function(){

	Route::post('getDataUserPosts','CommentPostsController@getDataUserPosts');

	Route::get('commentPosts','CommentPostsController@commentPosts');

});

