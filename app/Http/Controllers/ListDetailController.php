<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function list(Request $request, Faker $faker)
    {
        $filter = $request->input('filter', null);

        return response()->json([
            'data' => $this->getContent(10, null, $filter, $request),
        ]);
    }

    public function detail(Request $request, Faker $faker, $id)
    {
        return response()->json([
            'data' => $this->getContent(1, $id, null, $request),
        ]);
    }

    public function detailAutoId(Request $request, Faker $faker)
    {
        return response()->json([
            'data' => $this->getContent(1, rand(1, 5), null, $request),
        ]);
    }

    public function listAuth(Faker $faker)
    {
        return $this->list($faker);
    }

    public function detailAuth(Faker $faker, $id)
    {
        return $this->detail($faker, $id);
    }

    private function getContent(int $count = 10, int $fixedId = null, string $filter = null, Request $request): array
    {
        $htmlImage = $request->input('htmlImage', null);

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

            $image = $this->getImage();
            if ($htmlImage) {
                $image = '<a href="#"><img src="'.$request->root().'/' . $image . '"></a>';
            }

            $arrContent[] = [
                'id' => $id,
                'title' => ($filter ? ucfirst($filter) . ' ' : '') . $this->faker->sentence(),
                'path' => '/detail/' . $id,
                'link' => $link,
                'linkIcon' => $linkIcon,
                'image' => $image,
                'source' => $this->faker->domainName,
                'description' => $this->faker->text(),
                'icons' => $this->getIcons(),
                'labels' => $this->getLabels(),
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

    private function getLabels(): array
    {
        return [
            $this->faker->randomFloat(2, 5, 200),
        ];
    }
}
