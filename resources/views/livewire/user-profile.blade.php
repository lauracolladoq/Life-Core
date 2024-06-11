<div>
    <div class="main-middle-profile">
        <div class="profile-info">
            <div class="personal-info">
                <div class="profile-picture-bigger" id="my-profile-picture">
                    <img src="{{ Storage::url($user->avatar) }}" alt="" />
                </div>
                <div class="profile-handle">
                    <h4 class="font-extrabold">{{ $user->name }}</h4>
                    <p class="text-gry"><span>@</span>{{ $user->username }}</p>
                </div>
            </div>
            <div class="social-info">
                <div>
                    <h5 class="font-extrabold text-sm">Followers</h5>
                    <p class="text-gry">{{ $user->followers()->count() }}</p>
                </div>
                <div>
                    <h5 class="font-extrabold text-sm">Following</h5>
                    <p class="text-gry">{{ $user->following()->count() }}</p>
                </div>
            </div>
            <div>
                @auth
                    <button wire:click="follow({{ $user->id }})" class="btn btn-primary">
                        <!-- Si el usuario autenticado ya sigue al usuario, el botón cambia a Unfollow -->
                        @if ($user->followers->contains(auth()->user()))
                            Unfollow
                            <!-- Si no sigue al usuario, el botón cambia a Follow -->
                        @else
                            Follow
                        @endif
                    </button>
                @endauth
            </div>
        </div>
        <div class="profile-feeds">
            @if (count($posts))
                @foreach ($posts as $post)
                    <div class="profile-feed">
                        <a href="{{ route('post-detail', $post->id) }}" class="feed-img">
                            <img src="{{ Storage::url($post->image) }}" class="w-full h-full rounded bg-center bg-cover" alt="" />
                        </a>
                    </div>
                @endforeach
            @else
                <div class="col-span-3">
                    <p class="text-2xl text-center font-bold">
                        There are no posts yet!
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>
