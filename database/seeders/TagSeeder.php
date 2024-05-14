<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Animals' => "#FFCCCC",
            'Art' => "#FFDAB9",
            'Movies' => "#FFFACD",
            'Sports' => "#C1FFC1",
            'Fashion' => "#ADD8E6",
            'Technology' => "#E6E6FA",
            'Videogames' => "#FFB6C1"
        ];

        foreach ($tags as $n => $c) {
            Tag::create([
                'name' => $n,
                'color' => $c
            ]);
        }
    }
}
