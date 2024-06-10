<!-- Si el cursor está sobre el input se muestra el div con los resultados, sino desaparece -->
<div wire:mouseenter="$set('showResults', true)" wire:mouseleave="$set('showResults', false)">
    <i class="fa fa-search"></i>
    <input type="search" placeholder="Search User" wire:model.live="string" />
    <div @class(['search-results', 'hidden' => $showResults == false])>
        <!-- Si hay usuarios que coincidan con la búsqueda se muestran -->
        @if (count($users))
            @foreach ($users as $user)
                <a href="{{ route('user-profile', $user->id) }}"
                    class="search-result pt-2 text-center flex gap-2 align-middle justify-start">
                    <div class="profile-picture">
                        <img src="{{ Storage::url($user->avatar) }}" alt="" />
                    </div>
                    <div class="flex flex-col text-left">
                        <h4 class="font-bold">{{ $user->name }}</h4>
                        <p class="text-gray"><span>@</span>{{ $user->username }}</p>
                    </div>
                </a>
            @endforeach
            <!-- Si no hay resultados se muestra un mensaje -->
        @else
            <p class="pt-2 text-center">No results found</p>
        @endif
    </div>
</div>
