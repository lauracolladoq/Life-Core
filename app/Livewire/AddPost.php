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

    #[Validate('nullable', 'string', 'max:200')]
    public string $content = '';

    #[Validate('nullable', 'array', 'exists:tags,id')]
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

        $this->dispatch('eventAddPost')->to(Home::class);

        //Mensaje de info
        $this->dispatch("message", "New post created successfully!");
        $this->cancelAddPost();
    }

    public function cancelAddPost()
    {
        $this->reset(['openModalAddPost', 'image', 'content', 'tags']);
    }

    public function render()
    {
        $myTags = Tag::all();
        return view('livewire.add-post', compact('myTags'));
    }
}
