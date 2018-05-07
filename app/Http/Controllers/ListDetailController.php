<?php

namespace App\Http\Controllers;

class ListDetailController extends Controller
{
    public function list()
    {
        return response()->json([
            'data' => [
                [
                    'id' => 1,
                    'path' => '/content/1',
                    'link' => 'https://google.de',
                    'image' => 'images/test01.jpg',
                    'source' => 'list-detail-example',
                    'description' => '01. Lorem ipsum bla bla bla',
                ],
                [
                    'id' => 2,
                    'path' => '/content/2',
                    'link' => 'https://google.de',
                    'image' => 'images/test02.jpg',
                    'source' => 'list-detail-example',
                    'description' => '02- Lorem ipsum bla bla bla',
                ]
            ],
        ]);
    }

    public function detail()
    {
        return response()->json([
            'data' => [
                [
                    'id' => 1,
                    'path' => '/content/1',
                    'link' => 'https://google.de',
                    'image' => 'images/test01.jpg',
                    'source' => 'list-detail-example',
                    'description' => 'Lorem ipsum lorem ipsum lorem ipsum',
                ]
            ],
        ]);
    }
}
