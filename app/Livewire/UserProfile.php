<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Illuminate\Routing\Route;
use Livewire\Component;

class UserProfile extends Component
{
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        $posts = Post::select('id', 'user_id', 'image', 'content', 'created_at')
            ->where('user_id', $this->user->id)
            ->orderBy('created_at', 'desc')
            ->with('comments')
            ->get();

        return view('livewire.user-profile', compact('posts'));
    }

    public function follow(User $user)
    {
        //toogle para seguir o dejar de seguir
        $this->user->followers()->toggle(auth()->user()->id);
    }
}
