<div>
    <x-button wire:click="$set('openModalEdit', true)" class="btn btn-primary">Edit</x-button>
    <x-dialog-modal wire:model="openModalEdit">
        <x-slot name="title">
            <div class="flex justify-between items-center">
                <h2 class="font-extrabold flex-grow text-center">Edit Profile</h2>
                <button wire:click="cancelarEdit" class="flex-shrink-0 ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
                        <path d="M18 6L12 12M12 12L6 18M12 12L18 18M12 12L6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </x-slot>
        <x-slot name="content">
            <div class="flex flex-col items-center justify-center text-center gap-2">
                <div>
                    <div id="my-profile-picture" class="my-profile-picture">
                        <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="" />
                    </div>
                    <x-input type="file" id="avatar" wire:model="avatar" />
                    <x-input-error for="avatar" />
                </div>
                <div>
                    <x-label for="name">Name:</x-label>
                    <x-input id="name" name="name" wire:model="name"></x-input>
                    <x-input-error for="name" />
                </div>
                <div>
                    <x-label for="username">Username:</x-label>
                    <x-input id="username" name="username" wire:model="username"></x-input>
                    <x-input-error for="username" />
                </div>
            </div>
</x-slot>
<x-slot name="footer">
    <button wire:click="store" wire:loading.attr="disabled" class="btn btn-primary btn-lg">
        Save
    </button>
</x-slot>
</x-dialog-modal>
</div>