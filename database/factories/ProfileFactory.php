<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $id = 0;
        $id+=1;
        return [
            'full_name' =>$this->faker->name,
            'address' => $this->faker->address,
            'avatar' => '/storage/uploads/chii.jpg',
            'birthday' => $this->faker->date(),
            'user_id' =>$id,
        ];
    }
}
