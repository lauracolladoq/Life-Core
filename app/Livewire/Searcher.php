<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Searcher extends Component
{
    public $string = '';
    public bool $showResults = false;

    public function render()
    {
        $users = [];

        // Si el string no está vacío, buscamos usuarios que coincidan con el nombre o el username ya que 
        // si el string está vacío, muestra todos los usuarios
        if (!empty($this->string)) {
            $users = User::where('name', 'like', '%' . $this->string . '%')
                ->orWhere('username', 'like', '%' . $this->string . '%')
                ->get();
        }

        // Si está logueado, no mostramos el usuario logueado en los resultados
        if (auth()->check()) {
            $users = collect($users)->filter(function ($user) {
                return $user->id !== auth()->id();
            })->all();
        }

        return view('livewire.searcher', compact('users'));
    }
}
