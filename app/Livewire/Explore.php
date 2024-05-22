<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class Explore extends Component
{
    #[On('eventAddPost')]
    public function render()
    {
        $posts = Post::select('id', 'user_id', 'image', 'content', 'created_at')
            ->orderBy('id')
            ->with('user', 'tags', 'comments')
            ->get();

            //Si el usuario está logueado, se obtienen los likes del usuario para mostrarlos en la vista
        if (auth()->check()) {
            $myLikes = Post::whereHas('usersLikes', function ($q) {
            $q->where('user_id', auth()->user()->id);
            })->get();
            return view('livewire.explore', compact('posts', 'myLikes'));
        }
        
        //Si el usuario no está logueado, se renderiza la vista sin los likes, solo con los posts
        return view('livewire.explore', compact('posts'));
    }
    public function like(Post $post)
    {
        //toogle para agregar o quitar like
        $post->usersLikes()->toggle(auth()->user()->id);
    }
}
