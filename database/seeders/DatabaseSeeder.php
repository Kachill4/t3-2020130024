<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\author;
use App\Models\book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $faker = Faker::create('id_ID');
        $faker->seed(123);
        for ($i = 0; $i < 4; $i++) {
            author::create([
                "nama" => $faker->firstName . " " . $faker->lastName,
                "kota" => $faker->city,
                "negara" => $faker->country
            ]);
        }
        $kate = [
            "Action",
            "Edukasi",
            "Romantis",
            "Fanfiction",
            "Science Fiction",
            "Fantasy",
            "Thriller",
            "Historical",
            "Horor",
            "Realistic Fiction"
        ];
        for ($i = 0; $i < 10; $i++) {
            book::create(
                [
                    'judul' => $faker->title,
                    'halaman' => $faker->randomNumber(3),
                    'kategori'  => $faker->randomElement($kate),
                    'penerbit'  => $faker->word,
                    'author_id' => $faker->numberBetween(1, 4)
                ]
            );
        }
    }
}
