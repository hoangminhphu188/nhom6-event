<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'username' => 'admin',
            'password' => Hash::make('nhom6event'),
        ]);

        // $faker = Faker::create();
        // foreach (range(1, 200) as $index) {
        //     DB::table('events')->insert([
        //         'name' => $faker->name,
        //         'description' => $faker->text,
        //         'location' => $faker->address,
        //         'start_date' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d H:i'),
        //         'end_date' => $faker->dateTimeBetween('now', '+1 years')->format('Y-m-d H:i'),
        //         'image' => $faker->imageUrl(),
        //         'famous_person' => json_encode($faker->randomElements(['Nguyen Van A', 'Nguyen Van B', 'Nguyen Van C'], 3)),
        //         'free_food' => json_encode($faker->randomElements(['Pho', 'Chao', 'Bun'], 3)),
        //         'status' => $faker->randomElement(['1', '0']),
        //         'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
        //     ]);
        // }
    }
}
