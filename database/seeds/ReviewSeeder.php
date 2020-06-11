<?php

use App\Model\Product;
use App\Model\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(Review::class,300)->create();
        for ($i = 1; $i <= 300; $i++) {
            $users = Product::all()->pluck('id')->toArray();


            $faker = Faker\Factory::create();
            $review = new Review();
            $review->product_id = $faker->randomElement($users);
            $review->customer = $faker->name;
            $review->review = $faker->paragraph;
            $review->star = $faker->numberBetween(0, 5);

            $review->save();
        }


    }
}
