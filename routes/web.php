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

$router->group(['namespace' => 'Api'], function() use ($router) {
    $router->group(['prefix' => 'product'], function () use ($router) {
        $router->get('data', 'ProductController@index');
        $router->post('add', 'ProductController@create');
        $router->put('update/{id}', 'ProductController@update');
        $router->delete('delete/{id}', 'ProductController@delete');
    });
    $router->group(['prefix' => 'users'], function () use ($router) {
        $router->get('data', 'UsersController@index');
        $router->post('add', 'UsersController@create');
        $router->put('update/{id}', 'UsersController@update');
        $router->delete('delete/{id}', 'UsersController@delete');
    });
});