<?php

namespace App\Livewire\Forms;

use App\Livewire\MyProfile;
use App\Models\Post;
use Livewire\Attributes\Validate;
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
            'tags' => ['nullable', 'array', 'exists:tags,id'],
        ];
    }

    public function update()
    {
        $this->validate();

        $this->post->update([
            'content' => $this->content
        ]);

        //Actualiza sus tags
        $this->post->tags()->sync($this->tags_id);

        //Se dispara el evento para actualizar la vista MyProfile una vez actualizado el post
        /*
        $this->dispatch('eventUpdatePost')->to(MyProfile::class);

        // Se dispara el evento para mostrar el mensaje informativo
        $this->dispatch("message", "Post updated!"); 
        */

        $this->cancelUpdatePost();
    }

    public function cancelUpdatePost()
    {
        $this->reset(['post', 'content', 'tags_id', 'openModalUpdatePost']);

        //Limpiar errores
        $this->resetErrorBag();
    }
}
