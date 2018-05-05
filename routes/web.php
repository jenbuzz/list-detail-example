<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/list', function () {
    return response()->json([
        'data' => [
            [
                'id' => 1,
                'path' => '/content/1',
                'link' => 'https://google.de',
                'image' => 'test.jpg',
                'source' => 'list-detail-example',
            ]
        ],
    ]);
});

$router->get('/detail', function () {
    return response()->json([
        'data' => [
            [
                'id' => 1,
                'path' => '/content/1',
                'link' => 'https://google.de',
                'image' => 'test.jpg',
                'source' => 'list-detail-example',
            ]
        ],
    ]);
});
