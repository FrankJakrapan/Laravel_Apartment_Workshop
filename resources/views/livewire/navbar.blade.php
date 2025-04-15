<div class="navbar">
    <div class="flex items-center justify-between">
        <div>
            <i class="fa-solid fa-user text-xl me-2"></i>
            <span class="username text-2xl">{{ $user_name }} [ {{ $userLevel }} ] </span>
        </div>
        <div>
            <button
                wire:click="editProfile"
                class="border border-blue-300 text-blue-300 px-6 py-3 rounded-2xl hover:bg-blue-400 hover:text-white mr-2"
            >
                <i class="fa-solid fa-user mr-2"></i>
                แก้ไขข้อมูลส่วนตัว
            </button>
            <button wire:click="showModal = true" class="border border-orange-400 text-orange-400 px-6 py-3 rounded-2xl hover:bg-orange-500 hover:text-white">
                Logout
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

    <x-modal wire:model="showModalEdit" title="แก้ไขข้อมูลส่วนตัว" maxWidth="sm">
        @if ($errors->any())
            <div class="alert-danger"> 
                @foreach ($errors->all() as $errors)
                    <p>{{ $errors }}</p>
                @endforeach
            </div>
        @endif
        
        <div>Username</div>
        <input type="text" class="form-control" wire:model="username">

        <div class="mt-5">Password ใหม่</div>
        <input type="password" class="form-control" wire:model="password">

        <div class="mt-5">ยืนยัน Password ใหม่</div> 
        <input type="password" class="form-control" wire:model="password_confirm">

        <div class="mt-5 text-center pb-5">
            <button class="btn-success mr-2" wire:click="updateProfile">
                <i class="fa-solid fa-check mr-2"></i>
                บันทึก
            </button>
            <button class="btn-danger" wire:click="showModalEdit = false">
                <i class="fa-solid fa-xmark mr-2"></i>
                ยกเลิก
            </button>
        </div>
        @if ($saveSuccess)
            <div class="alert-success alert">
                <i class="fa fa-check mr-2"></i>
                บันทึกข้อมูลสําเร็จ
            </div>
        @endif
    </x-modal>
</div>

