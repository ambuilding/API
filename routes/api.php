<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('search/{term}', function($term)
{
	return [
		'result' => $term
	];
})->middleware('throttle:3'); // 60 requests per minute
// middleware('throttle:30,5') 30 requests in 5 mins

Route::middleware('auth:api')->get('/', function ()
{
	return Auth::user();
	//return Auth::guard('api')->user(); // check() / guest()
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout');

Route::get('lessons/{id}/tags', 'TagController@index');

Route::get('lessons', 'LessonController@index');
Route::get('lessons/{id}', 'LessonController@show');
Route::post('lessons', 'LessonController@store');
Route::group(['middleware' => 'auth:api'], function() {

	Route::put('lessons/{lesson}', 'LessonController@update');
	Route::delete('lessons/{lesson}', 'LessonController@delete');
});

Route::resource('tags', 'TagController', ['only' => [
    'index', 'show'
]]);
