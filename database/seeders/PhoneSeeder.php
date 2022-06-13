<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Kind;
use App\Models\Phone;
use App\Models\Product;
use App\Models\ReleaseDate;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['phone' => 'Xiaomi', 'kinds' => ['Redmi Note 7', 'Redmi Note 10', 'Poco X4']],
            ['phone' => 'Realme', 'kinds' => ['Realme C4', 'Razor Pro']],
            ['phone' => 'Samsung', 'kinds' => ['Galaxy A10', 'Galaxy A11']],
            ['phone' => 'Iphone', 'kinds' => ['Iphone 10', 'Iphone 11']],
            ['phone' => 'Infinix', 'kinds' => ['Infinix 1', 'Infinix 2']],
            ['phone' => 'Evercoss', 'kinds' => ['Ecoss 1', 'Ecoss 2']],
            ['phone' => 'LG', 'kinds' => ['LG 1', 'LG 2']],
            ['phone' => 'Asus', 'kinds' => ['Asus 1', 'Asus 2']],
            ['phone' => 'Oppo', 'kinds' => ['Reno 1', 'Reno 2']],
            ['phone' => 'Vivo', 'kinds' => ['Vivo 1', 'Vivo 2']],
        ];

        DB::transaction(function () use ($data) {
            $faker =  Factory::create();

            //create products
            foreach (['Smartwatch', 'Tablet', 'Smartwatch'] as $product) {
                Product::create([
                    'name' => $product
                ]);
            }

            //create phones and others
            foreach ($data as $phone) {

                //create phone
                $createdPhone = Phone::create([
                    'name' => $phone['phone'],
                    'founded' => $faker->year,
                    'description' => $faker->paragraph,
                ]);

                //create kind
                foreach ($phone['kinds'] as $kind) {
                    $createdKind = Kind::create([
                        "name" => $kind,
                        "phone_id" => $createdPhone->id
                    ]);

                    //create release date
                    ReleaseDate::create([
                        'kind_id' => $createdKind->id,
                        "date" => $faker->date
                    ]);

                    //create colors
                    $colors = ['red', 'black', 'white'];
                    foreach ($colors as $color) {
                        Color::create([
                            'kind_id' => $createdKind->id,
                            "color" => $color
                        ]);
                    }
                }
            }
        });
    }
}
