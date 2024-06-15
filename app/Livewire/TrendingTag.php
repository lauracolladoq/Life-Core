<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Attributes\On;
use Livewire\Component;

class TrendingTag extends Component
{
    public Tag $tag;


    public function mount(Tag $tag)
    {
        $this->tag = $tag;
    }

    #[On('eventAddComment')]
    public function render()
    {
        $tag = $this->tag;

        $posts = Post::with('user', 'tags', 'comments')
            ->whereHas('tags', function ($query) use ($tag) {
            $query->where('tag_id', $tag->id);
            })
            ->latest()
            ->get();

        if (auth()->check()) {
            $myLikes = Post::whereHas('usersLikes', function ($q) {
                $q->where('user_id', auth()->user()->id);
            })->get();
            return view('livewire.trending-tag', compact('posts', 'tag', 'myLikes'));
        }

        return view('livewire.trending-tag', compact('posts', 'tag'));
    }

    public function like(Post $post)
    {
        //toogle para agregar o quitar like
        $post->usersLikes()->toggle(auth()->user()->id);
    }


    public function delete(Comment $comment)
    {
        $comment->delete();

        // Se dispara el evento para mostrar el mensaje informativo
        $this->dispatch("message", "Comment deleted!");
    }
}
