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
            'Animals' => "#FF0000",
            'Art' => "#FF6200",
            'Movies' => "#FFC300",
            'Food' => "#BFE100",
            'Sports' => "#7FFF00",
            'Music' => "#55CF7F",
            'Fashion' => "#1E90FF",
            'Nature' => "#5530D0",
            'Technology' => "#8A2BE2",
            'Travel' => "#B75F8D",
            'Video Games' => "#FF1493"
        ];

        foreach ($tags as $n => $c) {
            Tag::create([
                'name' => $n,
                'color' => $c
            ]);
        }
    }
}
