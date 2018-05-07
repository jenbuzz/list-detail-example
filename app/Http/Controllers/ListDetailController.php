<?php

namespace App\Http\Controllers;

use Faker\Factory as Faker;

class ListDetailController extends Controller
{
    private $faker;

    private $images = [
        'images/test01.jpg',
        'images/test02.jpg',
    ];

    public function __construct()
    {
        $this->faker = Faker::create();
    }

    public function list(Faker $faker)
    {
        return response()->json([
            'data' => $this->getListContent(),
        ]);
    }

    public function detail(Faker $faker)
    {
        return response()->json([
            'data' => $this->getListContent(1),
        ]);
    }

    private function getListContent($count = 10): array
    {
        $arrContent = [];

        for ($i = 0; $i < $count; $i++) {
            $id = $this->faker->randomDigitNotNull;

            $arrContent[] = [
                'id' => $id,
                'path' => '/detail/' . $id,
                'link' => $this->faker->url,
                'image' => $this->getImage(),
                'source' => $this->faker->domainName,
                'description' => $this->faker->text(),
            ];
        }

        return $arrContent;
    }

    private function getImage(): string
    {
        return $this->images[array_rand($this->images)];
    }
}
