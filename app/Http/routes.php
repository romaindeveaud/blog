<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/*
$app->get('/', function () use ($app) {
  //    return $app->welcome();
  return view('index');
});
 */

/*
$app->get('/login', function() use ($app) {
  return view('auth.login');
});
*/
$app->get('/login',  'AuthController@login');
$app->get('/logout', 'AuthController@logout');
$app->post('/login', 'AuthController@authenticate');

$app->get('/', 'PostController@index');
$app->get('/post/{id:[0-9]+}', 'PostController@show_with_id');
$app->get('/post/{urlified_title:[A-Za-z\-]+}', 'PostController@show');
/*
$app->get('/new-post', [ 'middleware' => 'auth', function() use ($app) {
  return view('post.create');
}]);
 */
$app->get('/new-post', [ 'middleware' => 'auth', 'uses' => 'PostController@new_post' ]);

$app->post('/post/save', 'PostController@save');
$app->get('/post/delete/{id}', [ 'middleware' => 'auth', 'uses' => 'PostController@destroy' ]);
$app->get('/post/edit/{id}', [ 'middleware' => 'auth', 'uses' => 'PostController@edit' ]);
$app->post('/post/update/{id}', [ 'middleware' => 'auth', 'uses' => 'PostController@update' ]);

$app->post('/img-bg-upload', 'PostController@image_bg_upload');
$app->post('/img-upload',    'PostController@image_upload');
$app->post('/save-draft',    'PostController@save_draft');

$app->get('/dashboard', [ 'middleware' => 'auth', 'uses' => 'DashboardController@index' ]);

$app->get('/about', function() use ($app) {
  return view('about');
});
