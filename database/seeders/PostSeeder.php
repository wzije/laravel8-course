<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voidc
     */
    public function run()
    {
        Post::factory()->count(500)->create();
    }
}
