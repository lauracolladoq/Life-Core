<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creación de Posts almacenados en una variable para asignarlos tags y likes de forma aleatoria
        $posts = Post::factory(30)->create();

        foreach ($posts as $item) {
            $item->tags()->attach($this->getIdTagsRandom());
            $item->usersLikes()->attach(self::getArrayLikes());
        }
    }

    // Obtiene un array con todos los Tags y los almacena de forma aleatoria como arrays en un nuevo array
    private function getIdTagsRandom(): array
    {
        $tags = [];

        $arrayTags = Tag::pluck('id')->toArray();
        $indices = (array) array_rand($arrayTags, random_int(1, count($arrayTags)));
        foreach ($indices as $indice) {
            $tags[] = $arrayTags[$indice];
        }
        return $tags;
    }

    // Obtiene un array con todos los Likes de un usuario y y los almacena de forma aleatoria como arrays en un nuevo array
    private static function getArrayLikes(): array
    {
        $likes = [];
        $usersId = User::pluck('id')->toArray();
        $indices = array_rand($usersId, random_int(1, count($usersId)));

         // Si solo se elige un índice, se devuelve como array
        if (!is_array($indices)) {
            return [$usersId[$indices]];
        }

        foreach ($indices as $indice) {
            $likes[] = $usersId[$indice];
        }

        return $likes;
    }
}
