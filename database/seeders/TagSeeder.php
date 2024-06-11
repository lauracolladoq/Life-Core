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
            'Animals' => "#ffb3ba",
            'Art' => "#ffdfba",
            'Movies' => "#ffffba",
            'Sports' => "#baffc9",
            'Fashion' => "#bae1ff",
            'Technology' => "#dbdcff",
            'Videogames' => "#ffdede"
        ];
        
        foreach ($tags as $n => $c) {
            Tag::create([
                'name' => $n,
                'color' => $c
            ]);
        }
    }
}
