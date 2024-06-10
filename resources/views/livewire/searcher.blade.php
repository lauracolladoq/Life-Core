<div>
    <i class="fa fa-search"></i>
    <input type="search" placeholder="Search User" wire:model.live="string" />
    @if (count($users))
        <div class="search-results">
            @foreach ($users as $user)
                <a href="" class="search-result pt-2 text-center flex gap-2 align-middle justify-start">
                    <div class="profile-picture">
                        <img src="{{ Storage::url($user->avatar) }}" alt="" />
                    </div>
                    <div class="flex flex-col text-left">
                        <h4 class="font-bold">{{ $user->name }}</h4>
                        <p class="text-gray"><span>@</span>{{ $user->username }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <p class="pt-2 text-center">No results found</p>
    @endif
</div>
