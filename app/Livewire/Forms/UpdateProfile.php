<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Form;

class UpdateProfile extends Form
{
    public ?User $user = null;
    public string $username = '';
    public string $name = '';
    public $avatar;

    public function setUser(User $user)
    {
        $this->user = $user;
        $this->username = $user->username;
        $this->name = $user->name;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:25'],
            'username' => ['required', 'string', 'max:25', 'unique:users,username,' . $this->user->id, 'alpha_dash'],
            'avatar' => ['nullable', 'image', 'max:2048']
        ];
    }

    public function editProfile()
    {
        $this->validate();

        $route = $this->user->avatar;

        if ($this->avatar) {
            // Guarda la nueva imagen y elimina la antigua si no es la imagen por defecto
            $route = $this->avatar->store('avatar');
            if ($this->user->avatar && basename($this->user->avatar) != 'default.png') {
                Storage::delete($this->user->avatar);
            }
        }

        $this->user->update([
            'avatar' => $route,
            'username' => $this->username,
            'name' => $this->name,
        ]);
    }

    public function cancelEditProfile()
    {
        $this->reset(['username', 'name', 'avatar']);
        $this->resetErrorBag();
    }
}
