<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{
    #[On('eventAddPost')]
    public function render()
    {
        // Obtiene el usuario logeado
        $user = User::find(auth()->user()->id);

        // Obtiene los ids de los usuarios que sigue el usuario logeado
        $followingIds = $user->following()->pluck('follower_id');

        $posts = Post::whereIn('user_id', $followingIds)
            ->select('id', 'user_id', 'image', 'content', 'created_at')
            ->orderBy('id', 'desc')
            ->with('user', 'tags', 'comments')
            ->get();


        $myLikes = Post::whereHas('usersLikes', function ($q) {
            $q->where('user_id', auth()->user()->id);
        })->get();

        return view('livewire.home', compact('posts', 'myLikes'));
    }

    public function like(Post $post)
    {
        //toogle para agregar o quitar like
        $post->usersLikes()->toggle(auth()->user()->id);
    } 
}