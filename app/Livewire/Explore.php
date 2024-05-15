<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Explore extends Component
{
    public function render()
    {
        $posts = Post::select('id', 'user_id', 'image', 'content', 'created_at')
        ->orderBy('id')
        ->with('user', 'tags', 'comments')
        ->get();

        return view('livewire.explore', compact('posts'));
    }
}
