<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});
$router->get('/ping', ['middleware' => 'auth:api', fn () => 'pong']);

$router->group(['namespace' => 'Api'], function() use ($router) {
    $router->group(['prefix' => 'product'], function () use ($router) {
        $router->get('data', 'ProductController@index');
        $router->post('add', 'ProductController@create');
        $router->put('update/{id}', 'ProductController@update');
        $router->delete('delete/{id}', 'ProductController@delete');
    });
    $router->group(['prefix' => 'users'], function () use ($router) {
        $router->group(['middleware' => 'auth:api'], function () use ($router) {
            $router->get('/ping', 'UsersController@ping');
            $router->get('/data', 'UsersController@index');
        });
        $router->get('get-user', 'UsersController@getDetailUser');
        $router->get('sendMail', 'UsersController@sendMail');
        $router->post('register','UsersController@register');
        $router->post('login','UsersController@login');
        $router->post('add', 'UsersController@create');
        $router->put('update/{id}', 'UsersController@update');
        $router->delete('delete/{id}', 'UsersController@delete');
    });
});