<div>
    <x-button wire:click="$set('openModalAddPost', true)" class="btn btn-primary">Add Post</x-button>
    <x-dialog-modal wire:model="openModalAddPost" class="justify-center ">
        <x-slot name="title">
            <div class="flex justify-between items-center">
                <h2 class="font-extrabold flex-grow text-center">Add New Post</h2>
                <button wire:click="cancelAddPost" class="flex-shrink-0 ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                        color="#666666" fill="none" id="closeIcon">
                        <path d="M18 6L12 12M12 12L6 18M12 12L18 18M12 12L6 6" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </x-slot>
        <x-slot name="content">
            <div class="row flex justify-between text-center flex-nowrap gap-5 p-2">
                <div class="column flex flex-col w-1/2">
                    <x-label for="image" class="font-extrabold text-center">Image</x-label>
                    <div class="relative div-image">
                        <input type="file" wire:model="image" accept="image/*" hidden id="image" />
                        <label for="image"
                            class="absolute btn btn-primary bottom-2">
                            <i class="fa-solid fa-upload mr-2"></i>Upload
                        </label>
                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}"
                                class="rounded-xl w-full h-full br-no-repeat bg-cover bg-center" />
                        @endif
                    </div>
                    <x-input-error for="image" class="my-2" />
                </div>
                <div class="column flex flex-col w-1/2">
                    <x-label for="content" class="font-extrabold text-center">Content</x-label>
                    <textarea id="content" name="content" wire:model="content" class="add-post w-full"></textarea>
                    <x-input-error for="content" class="pt-2"/>
                </div>
            </div>
            <div class="row flex flex-column pt-2">
                <x-label for="tags" class="font-extrabold text-center">Tags</x-label>
                <div class="flex flex-wrap gap-2 justify-center">
                    @foreach ($myTags as $tag)
                    <div class="flex items-center m-1 justify-center align-middle text-center">
                        <x-input id="{{ $tag->name }}" type="checkbox" value="{{ $tag->id }}"
                                 wire:model="tags" class="mr-1.5"/>
                        <x-label for="{{ $tag->name }}"
                                 class="p-1 m-0 bg-[{{ $tag->color }}] rounded-full
                                        text-black">
                            {{ $tag->name }}
                        </x-label>
                    </div>
                    @endforeach
                </div>
                <x-input-error for="tags" class="pt-2"/>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-button wire:click="store" wire:loading.attr="disabled" class="btn btn-primary">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
