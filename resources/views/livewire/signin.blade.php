<div class="mx-auto flex flex-col items-center justify-center h-screen bg-gradient-to-tr from-orange-500 to-white">
    <div class="w-full max-w-md border border-orange-400 rounded-md p-4 bg-white">
        <div class="text-2xl font-bold">
            <i class="fa fa-user me-2"></i>
            Sign In To BackOffice
        </div>
        <form class="mt-5" wire:submit="signIn">
            <div>Username</div>
            <input type="text" wire:model="username" placeholder="Username" class="form-control mt-1">
            @if(isset($errorUsername))
                <div class="text-red-500 mt-2">
                    {{ $errorUsername }}
                </div>
            @endif

            <div class="mt-4">Password</div>
            <input type="password" wire:model="password" placeholder="Password" class="form-control mt-1">
            @if(isset($errorPassword))
                <div class="text-red-500 mt-2">
                    {{ $errorPassword }}
                </div>
            @endif

            <button type="submit" class="btn btn-primary mt-5">
                Sign In
            </button>
        </form>

        @if(isset($error))
            <div class="text-red-500 mt-4">
                <i class="fa fa-exclamation-triangle me-2"></i>
                {{ $error }}
            </div>
        @endif
    </div>
</div>