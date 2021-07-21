<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('users')->insert([
            'name' => 'Asta',
            'email' => 'asta@gmail.com',
            'password' => Hash::make('123'),
        ]);
        foreach(range(1,20) as $_){
        DB::table('masters')->insert([
            'name' => $faker->firstname,
            'surname' => $faker->lastName,
        ]);
        }
    }
}
