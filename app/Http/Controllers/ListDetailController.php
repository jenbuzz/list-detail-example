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

    public function detail(Faker $faker, $id)
    {
        return response()->json([
            'data' => $this->getListContent(1, $id),
        ]);
    }

    private function getListContent(int $count = 10, int $fixedId = null): array
    {
        $arrContent = [];

        for ($i = 0; $i < $count; $i++) {
            $id = $fixedId ?? $this->faker->randomDigitNotNull;

            $arrContent[] = [
                'id' => $id,
                'title' => $this->faker->sentence(),
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
