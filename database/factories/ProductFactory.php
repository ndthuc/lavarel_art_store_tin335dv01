<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $data = array("Yes", "No");
        return [
            'product_name' => Str::random(10),
            'description' => Str::random(10),
            'image' => '/storage/productImages/7637ae514349007d88a16c2d87dde927.jpg',
            'price' => rand(0, 100),
            'creation_date' => now(),
            'include_VAT' => $data[array_rand($data, 1)],
            'quantity' => rand(0, 100),
            'category_id' => rand(1, 10)
        ];
    }
}
