<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::factory(3)->create();
        User::factory(10)->create();
        Profile::factory(10)->create();
        Category::factory(10)->create();
        Product::factory(50)->create();
        OrderStatus::factory(4)->create();
        Order::factory(20)->create()->each(function ($order){
            $ids = range(1, 50);
            shuffle($ids);
            $sliced = array_slice($ids, 1, 10);
            $order->products()->attach($sliced);
        });
    }
}
