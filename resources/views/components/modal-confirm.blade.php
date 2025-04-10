@props(['title', 'text', 'clickConfirm', 'clickCancel', 'showModalDelete'])

<x-modal wire:model='{{ $showModalDelete }}' zIndex="51" title="{{ $title }}" maxWidth="xl" >
    <div class="p-5 text-center text-xl">
        <div class="text-8xl text-orange-500 mb-3">
            <i class="fa fa-question"></i>
        </div>
        <div class="text-4xl font-bold">{{ $title }}</div>
        <div class="mt-3 text-2xl">{{ $text }}</div>
    </div>
    <div class="mt-5 text-center pb-5">
        <button class="btn-success mr-2" wire:click="{{ $clickConfirm }}">
            <i class="fa-solid fa-check me-2"></i>
            Yes
        </button>
        <button class="btn-secondary" wire:click="{{ $clickCancel }}">
            <i class="fa-solid fa-times me-2"></i>
            No
        </button>
    </div>
</x-modal>