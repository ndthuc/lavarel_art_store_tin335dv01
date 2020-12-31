<?php

namespace Database\Factories;

use App\Models\Product;
use Carbon\Carbon;
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
            'image' => '/storage/productImages/anh-avatar-dep.jpg',
            'price' => rand(0, 100),
            'creation_date' => Carbon::now(),
            'include_VAT' => $data[array_rand($data, 1)],
            'quantity' => rand(0, 100),
            'category_id' => rand(1, 10)
        ];
    }
}
