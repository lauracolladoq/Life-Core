<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Component;

class TrendingTags extends Component
{
    public function render()
    {
        // Tags ordenados por la cantidad de posts que tienen
        $tags = Tag::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->get();

        return view('livewire.trending-tags', compact('tags'));
    }
}
