<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('auth/login', ['uses' => 'AuthController@authenticate']);

$router->group(['middleware' => 'jwt.auth'], function () use ($router) {
    $router->get('users', function () {
        return response()->json(\App\User::all());
    });

    $router->get('auth/list', 'ListDetailController@listAuth');

    $router->get('auth/detail/{id}', 'ListDetailController@detailAuth');
});

$router->get('list', 'ListDetailController@list');

$router->get('detail/{id}', 'ListDetailController@detail');

$router->get('detail', 'ListDetailController@detailAutoId');
