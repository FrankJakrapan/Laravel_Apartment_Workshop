<div class="navbar">
    <div class="flex items-center justify-between">
        <div>
            <i class="fa-solid fa-user me-2"></i>
            <span class="username">Admin System {{ $user_name }}</span>
        </div>
        <div>
            <button wire:click="showModal = true" class="border border-orange-400 text-orange-400 px-6 py-3 rounded-2xl">
                <span>Logout</span>
                <i class="fa-solid fa-sign-out ms-3"></i>
            </button>
        </div>
    </div>

    <x-modal wire:model="showModal" maxWidth="sm" title="Logout">
        <div class="text-center">
            <div><i class="fa-solid fa-question text-red-500 text-5xl"></i></div>
            <div class="text-xl font-bold text-gray-800 mt-3">Logout</div>
            <div class="text-gray-800 mt-3 text-2xl">Are you sure to logout ?</div>
        </div>
        <div class="flex justify-center mt-6">
            <button class="btn-danger mr-3" wire:click="logout">
                <i class="fa-solid fa-check me-2"></i>
                Yes
            </button>
            <button class="btn-secondary" wire:click="showModal = false">
                <i class="fa-solid fa-xmark me-2"></i>
                No
            </button>
        </div>
    </x-modal>
</div>

