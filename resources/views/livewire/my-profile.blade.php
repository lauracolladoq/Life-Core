<div>
    <div class="main-middle-profile">
        <div class="profile-info">
            <div class="personal-info">
                <div class="profile-picture-bigger" id="my-profile-picture">
                    <img src="{{ Storage::url(auth()->user()->avatar) }}"alt="" />
                </div>
                <div class="profile-handle">
                    <h4 class="font-extrabold">{{ auth()->user()->name }}</h4>
                    <p class="text-gry"><span>@</span>{{ auth()->user()->username }}</p>
                </div>
            </div>
            <div class="social-info">
                <div>
                    <h5 class="font-extrabold text-sm">Followers</h5>
                    <p class="text-gry">{{ auth()->user()->followers()->count() }}</p>
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
            @if (count($posts))
                @foreach ($posts as $post)
                    <div class="profile-feed">
                        <a href="{{ route('post-detail', $post->id) }}" class="feed-img">
                            <img src="{{ Storage::url($post->image) }}" class="w-full h-full rounded bg-center bg-cover"
                                alt="" />
                        </a>
                        <div class="post-options">
                            <button wire:click="deleteConfirmation({{ $post->id }})">
                                <i class="fas fa-trash text-red-500"></i>
                            </button>
                            <button wire:click="edit({{ $post->id }})">
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

    <!-- Update Post Modal -->
    @isset($form->post)
        <div>
            <x-dialog-modal wire:model="openModalUpdatePost" class="justify-center">
                <x-slot name="title">
                    <div class="flex justify-between items-center">
                        <h2 class="font-extrabold flex-grow text-center">Update Post</h2>
                        <button wire:click="cancelUpdate" class="flex-shrink-0 ml-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                color="#666666" fill="none">
                                <path d="M18 6L12 12M12 12L6 18M12 12L18 18M12 12L6 6" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </x-slot>
                <x-slot name="content">
                    <div class="row flex justify-between text-center flex-nowrap gap-5 p-2 add-post">
                        <div class="column flex flex-col w-1/2">
                            <x-label for="image" class="font-extrabold text-center">Image</x-label>
                            <div class="relative div-image">
                                @if ($post->image)
                                    <img src="{{ Storage::url($post->image) }}"
                                        class="rounded-xl w-full h-full br-no-repeat bg-cover bg-center" />
                                @endif
                            </div>
                        </div>
                        <div class="column flex flex-col w-1/2">
                            <x-label for="content" class="font-extrabold text-center">Content</x-label>
                            <textarea id="content" name="content" wire:model="form.content" class="add-post w-full"></textarea>
                            <x-input-error for="form.content" class="pt-2" />
                        </div>
                    </div>

                    <div class="row flex flex-column pt-2">
                        <x-label for="tags_id" class="font-extrabold text-center">Tags</x-label>
                        <div class="flex flex-wrap gap-2 justify-center">
                            @foreach ($tags as $tag)
                            <div class="flex items-center m-1 justify-center align-middle text-center">
                                <x-input id="{{ $tag->name }}" type="checkbox" value="{{ $tag->id }}"
                                         wire:model="form.tags_id" class="mr-1.5"/>
                                <x-label for="{{ $tag->name }}"
                                         class="p-1 m-0 bg-[{{ $tag->color }}] rounded-full
                                                text-black">
                                    {{ $tag->name }}
                                </x-label>
                            </div>
                        @endforeach
                        
                        </div>
                        <x-input-error for="form.tags_id" class="pt-2" />
                    </div>
                </x-slot>
                <x-slot name="footer">
                    <x-button wire:click="update" wire:loading.attr="disabled" class="btn btn-primary">
                        Save
                    </x-button>
                </x-slot>
            </x-dialog-modal>
        </div>

    @endisset
</div>
