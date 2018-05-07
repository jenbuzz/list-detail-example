<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/list', 'ListDetailController@list');

$router->get('/detail/{id}', 'ListDetailController@detail');
