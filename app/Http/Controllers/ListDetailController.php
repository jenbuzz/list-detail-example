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

    private $icons = [
        'images/icon01.png',
        'images/icon02.png',
    ];

    private $linkIcons = [
        'amazon',
        'android',
        'apple',
        'windows',
    ];

    public function __construct()
    {
        $this->faker = Faker::create();
    }

    public function list(Faker $faker)
    {
        return response()->json([
            'data' => $this->getContent(),
        ]);
    }

    public function detail(Faker $faker, $id)
    {
        return response()->json([
            'data' => $this->getContent(1, $id),
        ]);
    }

    private function getContent(int $count = 10, int $fixedId = null): array
    {
        $arrContent = [];

        for ($i = 0; $i < $count; $i++) {
            $id = $fixedId ?? $this->faker->randomDigitNotNull;

            $linkIcon = '';
            if ($i % 2 || $count === 1) {
                $link = [
                    [
                        'uri' => $this->faker->url,
                        'icon' => $this->getLinkIcon(),
                    ],
                    [
                        'uri' => $this->faker->url,
                        'icon' => $this->getLinkIcon(),
                    ],
                ];
            } else {
                $link = $this->faker->url;
                $linkIcon = $this->getLinkIcon();
            }

            $arrContent[] = [
                'id' => $id,
                'title' => $this->faker->sentence(),
                'path' => '/detail/' . $id,
                'link' => $link,
                'linkIcon' => $linkIcon,
                'image' => $this->getImage(),
                'source' => $this->faker->domainName,
                'description' => $this->faker->text(),
                'icons' => $this->getIcons(),
            ];
        }

        return $arrContent;
    }

    private function getImage(): string
    {
        return $this->images[array_rand($this->images)];
    }

    private function getIcons(): array
    {
        return [
            $this->icons[array_rand($this->icons)],
            $this->icons[array_rand($this->icons)]
        ];
    }

    private function getLinkIcon(): string
    {
        return $this->linkIcons[array_rand($this->linkIcons)];
    }
}
