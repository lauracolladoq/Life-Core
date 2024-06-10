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

        if (!empty($this->string)) {
            $users = User::where('name', 'like', '%' . $this->string . '%')
                ->orWhere('username', 'like', '%' . $this->string . '%')
                ->get();
        }

        return view('livewire.searcher', compact('users'));
    }
}