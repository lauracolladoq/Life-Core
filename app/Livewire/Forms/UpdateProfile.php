<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
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
            'username' => ['required', 'string', 'max:25', 'unique:users', 'alpha_dash'],
            'avatar' => ['nullable', 'image', 'max:2048']
        ];
    }

    public function editProfile()
    {
        $this->validate();

        $route = $this->user->avatar;

        if ($route) {
            if (basename($route) != 'default.png') {
                Storage::delete($route);
            }
            $route = $this->avatar->store('avatar');
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
