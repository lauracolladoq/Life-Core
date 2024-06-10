<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class UserProfile extends Component
{
    public $user;


    public function render()
    {
        $this->user = $this->user;

        $posts = Post::select('idd', 'user_id', 'image', 'content', 'created_at')
            ->where('user_id', $this->user->id)
            ->orderBy('created_at', 'desc')
            ->with('comments')
            ->get();

        return view('livewire.user-profile', compact('posts', 'user'));
    }
}
