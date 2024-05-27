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
                    <h5 class="font-extrabold text-sm">Followers</h4>
                        <p class="text-gry">44</p>
                </div>
                <div>
                    <h5 class="font-extrabold text-sm">Following</h4>
                        <p class="text-gry">21</p>
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