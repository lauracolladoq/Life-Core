<div>
    <div class="main-middle-profile">
        <div class="profile-info">
            <div class="personal-info">
                <div class="profile-picture-bigger" id="my-profile-picture">
                    <img src="{{ Storage::url(auth()->user()->avatar) }}"alt="" />
                </div>
                <div class="profile-handle">
                    <h4 class="font-extrabold">{{ auth()->user()->name}}</h4>
                    <p class="text-gry"><span>@</span>{{ auth()->user()->username}}</p>
                </div>
            </div>
            <div class="social-info">
                <div>
                    <h5 class="font-extrabold text-sm">Followers</h5>
                    <p class="text-gry">{{ auth()->user()->followers()->count()  }}</p>
                </div>
                <div>
                    <h5 class="font-extrabold text-sm">Following</h4>
                        <p class="text-gry">{{ auth()->user()->following()->count() }}</p>
                </div>
            </div>
            <div>
                @livewire('edit-profile')
            </div>
        </div>

        <div class="profile-feeds">
            @if(count($posts))
            @foreach($posts as $post)
            <div class="profile-feed">
                <div class="feed-img">
                    <img src="{{ Storage::url($post->image) }}" class="w-full h-full rounded bg-center bg-cover" alt="" />
                </div>
                <div class="post-options">
                    <button wire:click="deleteConfirmation({{$post->id}})">
                        <i class="fas fa-trash text-red-500"></i>
                    </button>
                    <button>
                        <i class="fas fa-edit"></i>
                    </button>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-span-3">
                <p class="text-2xl text-center font-bold">
                    Add your first post!
                </p>
            </div>

            @endif
        </div>

    </div>
</div>