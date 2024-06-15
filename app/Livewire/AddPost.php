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

        // Sincronizar los tags
        $post->tags()->attach($this->tags);

        // Se dispara el evento para mostrar el mensaje informativo
        $this->dispatch("message", "New post created!");
        $this->cancelAddPost();

        // Redireccionar a la página actual para que se actualice y añada el JavaScript ya que si utilizo render() no se ejecuta el JavaScript
        return redirect(request()->header('Referer'));
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
