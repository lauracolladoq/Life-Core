<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Searcher extends Component
{
    public string $string = "Buscar ...";
    public bool $ocultar=true;

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->string . '%')->orWhere('username', 'like', '%' . $this->string . '%')
            ->get();
        return view('livewire.searcher', compact('users'));
    }
}
