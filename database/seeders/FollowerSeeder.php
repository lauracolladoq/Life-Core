<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Follower;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            // Seguidores aleatorios que no sean el usuario
            $followers = User::where('id', '!=', $user->id)
                ->inRandomOrder()
                ->limit(rand(1, User::count() - 1))
                ->get();

            foreach ($followers as $follower) {
                Follower::create([
                    'user_id' => $user->id,
                    'follower_id' => $follower->id,
                ]);
            }
        }
    }
}