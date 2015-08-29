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

$app->get('/', 'PostController@index');
$app->get('/post/{id}', '\PostController@show');
$app->get('/new-post', function() use ($app) {
  return view('post.create');
});

$app->post('/new-post', 'PostController@create');
$app->post('/delete-post/{id}', 'PostController@delete');
$app->post('/edit-post/{id}', 'PostController@update');
