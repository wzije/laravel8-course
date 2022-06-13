<?php

namespace Database\Seeders;

use App\Models\Phone;
use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voidc
     */
    public function run()
    {

        //using factory
        // Phone::factory()->count(100)->create();

        //manully
        $faker = Factory::create();
        $i = 0;
        while ($i < 100) {
            DB::insert('insert into posts (title, body, created_at) values (?, ?, ?)', [$faker->name, $faker->paragraph, now()]);
            $i++;
        }
    }
}
