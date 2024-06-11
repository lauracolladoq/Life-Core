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
            'Animals' => "#FF3333", 
            'Art' => "#FF9933", 
            'Movies' => "#FFFF33", 
            'Sports' => "#00FF00", 
            'Fashion' => "#00BFFF",
            'Technology' => "#9932CC",
            'Videogames' => "#FF1493" 
        ];
        
        

        foreach ($tags as $n => $c) {
            Tag::create([
                'name' => $n,
                'color' => $c
            ]);
        }
    }
}
