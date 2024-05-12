<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $users = User::factory(10)->create();

        User::factory()->create([
            'name' => "Admin",
            'username' => "admin",
            'email' => "admin@email.es",
            'password' => "password",
        ]);

        $this->call(TagSeeder::class);

        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');

        $this->call(PostSeeder::class);
        Comment::factory(30)->create();
    }
}
