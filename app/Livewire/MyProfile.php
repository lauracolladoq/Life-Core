<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class MyProfile extends Component
{
    #[On('eventAddPost')]
    #[On('eventDeletedPost')]
    public function render()
    {
        $posts = Post::select('id', 'user_id', 'image', 'content', 'created_at')
            ->where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->with('user', 'tags', 'comments')
            ->get();

        $myLikes = Post::whereHas('usersLikes', function ($q) {
            $q->where('user_id', auth()->user()->id);
        })->get();

        return view('livewire.my-profile', compact('posts', 'myLikes'));
    }

    public function like(Post $post)
    {
        //toogle para agregar o quitar like
        $post->usersLikes()->toggle(auth()->user()->id);
    }

    public function deleteConfirmation(Post $post)
    {
        $this->dispatch('deleteConfirmation', $post->id);
    }

    #[On('eventDeletePost')]
    public function delete(Post $post)
    {
        // Se elimina la imagen del post y el post
        Storage::delete($post->image);
        $post->delete();

        // Se dispara el evento para actualizar la vista MyProfile una vez eliminado el post
        $this->dispatch('eventDeletedPost')->to(MyProfile::class);

        // Se dispara el evento para mostrar el mensaje informativo
        $this->dispatch("message", "Post deleted!");
    }
}
