<div class="pt-2">
    <div class="flex items-center gap-2">
        <x-input id="content" name="content" wire:model="content" class="w-full" placeholder="Add a comment!"></x-input>
        <x-button wire:click="store" wire:loading.attr="disabled" class="fa-regular fa-paper-plane">
        </x-button>
    </div>
    <x-input-error for="content" class="pt-2" />
</div>
