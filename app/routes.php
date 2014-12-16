<?php

// app/routes.php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|

/* retrieving data from pivot table test */

Route::get('/test', function() {

	//echo Paste\Pre::render(Chore::find(1)->tags->toArray());

	foreach(Chore::find(1)->tags as $tag) {
		echo Paste\Pre::render($tag->pivot->toArray());

	}

});

//show the home page
Route::get('/', 'IndexController@getIndex');
/**
* User
* (Explicit Routing)
*/
# Note: the beforeFilter for 'guest' on getSignup and getLogin is handled in the Controller
Route::get('/signup', 'UserController@getSignup');
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', ['before' => 'csrf', 'uses' => 'UserController@postSignup'] );
Route::post('/login', ['before' => 'csrf', 'uses' => 'UserController@postLogin'] );
Route::get('/logout', ['before' => 'auth', 'uses' => 'UserController@getLogout'] );


// Bind route parameters.
Route::model('chore', 'Chore');


Route::get('/chart', 'ChoreController@getChart');

Route::get('/create', 'ChoreController@getCreate');
Route::post('/create', 'ChoreController@handleCreate');

Route::get('/edit/{chore}', 'ChoreController@edit');
Route::post('/edit', 'ChoreController@handleEdit');

/* Route::get('/getTag{chore}', 'ChoreController@getTag');
Route::post('/postTag', 'ChoreController@postTag'); */

Route::get('/delete/{chore}', 'ChoreController@delete');
Route::post('/delete', 'ChoreController@handleDelete');

Route::get('/search', 'ChoreController@getSearch');
Route::post('/search', 'ChoreController@postSearch');


