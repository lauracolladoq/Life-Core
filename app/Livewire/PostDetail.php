<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class PostDetail extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    #[On('eventAddComment')]
    public function render()
    {
        $post = $this->post::with('user', 'tags', 'comments')->get();

        if (auth()->check()) {
            $myLikes = Post::whereHas('usersLikes', function ($q) {
                $q->where('user_id', auth()->user()->id);
            })->get();
            return view('livewire.post-detail', compact('post','myLikes'));
        }
        return view('livewire.post-detail', compact('post'));
    }

    public function like(Post $post)
    {
        //toogle para agregar o quitar like
        $post->usersLikes()->toggle(auth()->user()->id);
    }

    // Métodos para eliminar un comentario
    public function delete(Comment $comment)
    {
        $comment->delete();

        // Se dispara el evento para mostrar el mensaje informativo
        $this->dispatch("message", "Comment deleted!");
    }
}
