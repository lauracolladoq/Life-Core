<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditProfile extends Component
{

    use WithFileUploads;

    #[Validate(['required', 'image', 'max:1024'])]
    public $avatar;

    #[Validate('required', 'string', 'max:255')]
    public string $username="";

    #[Validate('required', 'string', 'max:255')]
    public string $name= "";

    public bool $openModalEdit = false;

    public function store()
    {

      $this->validate();
        // dd($this->imagen);
        $user = User::create([
            'avatar' => $this->avatar->store('users'),
            'username' => $this->username,
            'name' => $this->name,
        ]);

        //Añado tags
        $user->tags()->attach($this->tags);

        $this->dispatch('eventoUserEdit')->to(Home::class);

        //Mensaje de info
        $this->dispatch("mensaje", "User actualizado correctamente");
        $this->cancelarEdit();
    }

    public function cancelarEdit()
    {
        $this->reset(['openModalEdit', 'avatar', 'username', 'name']);
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}
