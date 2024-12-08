<?php

use Laravel\Lumen\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => 'calls'], function () use ($router) {
    $router->get('/', 'CallController@index');
    $router->get('/{id}', 'CallController@one');
    $router->put('/{id}', 'CallController@update');
    $router->patch('/{id}', 'CallController@update');

    $router->post('/create', 'CallController@create');
});

