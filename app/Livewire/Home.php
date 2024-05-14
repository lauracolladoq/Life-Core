<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $posts = Post::select('id', 'user_id', 'image', 'content', 'created_at')
            ->orderBy('id')
            ->with('user', 'tags', 'comments')
            ->take(5)
            ->get();


        $myLikes = Post::whereHas('usersLikes', function ($q) {
            $q->where('user_id', auth()->user()->id);
        })->get();

        return view('livewire.home', compact('posts', 'myLikes'));
    }
}
