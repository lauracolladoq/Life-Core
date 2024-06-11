<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Form;

class UpdatePost extends Form
{
    public ?Post $post = null;
    public string $content = '';
    public array $tags_id = [];

    public function setPost(Post $post)
    {
        $this->post = $post;
        $this->content = $post->content;
        $this->tags_id = $post->getTagsId();
    }

    public function rules(): array
    {
        return [
            'content' => ['nullable', 'string', 'max:255'],
            'tags_id' => ['nullable', 'array', 'exists:tags,id'],
        ];
    }

    public function editPost()
    {

        $this->validate();

        $this->post->update([
            'content' => $this->content,
        ]);

        $this->post->tags()->sync($this->tags_id);
    }

    public function cancelEditPost()
    {
        $this->reset(['content', 'tags_id']);
        $this->resetErrorBag();
    }
}
