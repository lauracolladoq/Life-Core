<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Tag;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPost extends Component
{
    use WithFileUploads;

    #[Validate(['required', 'image', 'max:2048'])]
    public $image;

    #[Validate(['nullable', 'string', 'max:255'])]
    public string $content = '';

    #[Validate(['nullable', 'array', 'exists:tags,id'])]
    public array $tags = [];

    public bool $openModalAddPost = false;

    public function store()
    {

        $this->validate();
        $post = Post::create([
            'image' => $this->image->store('posts'),
            'content' => $this->content,
            'user_id' => auth()->id(),
        ]);

        $post->tags()->attach($this->tags);

        // Si disparo el evento a todos con un array da error en la vista, por eso se dispara a cada uno por separado, 
        // además si los disparo juntos separándolos por comas, se ejecutan en orden aleatorio

        // Se dispara el evento para actualizar los posts en las vistas Home, Explore y MyProfile
        $this->dispatch('eventAddPost')->to(Home::class);
        $this->dispatch('eventAddPost')->to(Explore::class);
        $this->dispatch('eventAddPost')->to(MyProfile::class);

        // Se dispara el evento para mostrar el mensaje informativo
        $this->dispatch("message", "New post created!");
        $this->cancelAddPost();
    }

    
    public function cancelAddPost()
    {
        $this->reset(['openModalAddPost', 'image', 'content', 'tags']);

        //Limpiar errores
        $this->resetErrorBag();
    }

    public function render()
    {
        $myTags = Tag::all();
        return view('livewire.add-post', compact('myTags'));
    }
}
