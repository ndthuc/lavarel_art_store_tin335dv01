<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $artItem = array("Watercolor Paint",
            "Acrylic Paint",
            "Oil Paint",
            "Canvas and Surfaces",
            "Colored Pencils",
            "Markers",
            "Watercolor Paper",
            "Brushes and Painting Tools",
            "Easels & Furniture",
            "Frames");
        static $index = 0;
        return [
            'categoryName' => $artItem[$index++],
            'description' =>Str::random(10)
        ];
    }
}
