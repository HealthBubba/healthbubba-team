<x-modal id="{{$modal}}" data-dismiss >
    <h5>Search User by Email Address or Referral Code</h5>
    <form wire:submit="search" >
        <div class="d-flex gap-3 mb-2">
            <x-input type="email" wire:model="email" class="flex-fill" placeholder="Email Address or Referral Code" />
            <x-button wire:loading wire:target="search" class="btn-primary flex-shrink-0" >Search User</x-button>
        </div>
        <x-input.error class="fs-6" key="email" />
    </form>

    @if ($user)
        <div>
            <div class="d-flex align-items-center gap-1 mb-2">
                <i class="ki-outline ki-check fs-2 text-primary" ></i> 
                <h6 class="mb-0 fw-medium">User Found</h6>
            </div>

            <div class="bg-light p-3 rounded-3 mb-4" >
                <p class="fw-semibold fs-6 mb-0">{{ $user->first_name }} {{ $user->last_name }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="text-muted fs-6 mb-0" >{{ $user->email }}</p>
                    <p class="text-muted fs-6 mb-0">{{ $user->referral_code }}</p>
                </div>
            </div>

            <div>
                <x-button class="btn-primary w-100" wire:click="save" wire:loading wire:target="save" >Add User</x-button>
            </div>
        </div>
        @elseif (!$user && $email)
        <div class="d-flex align-items-center gap-1 mb-2">
            <i class="ki-outline ki-cross fs-2 text-danger" ></i> 
            <h6 class="mb-0 fw-medium">User Not Found</h6>
        </div>
    @endif
    <x-button class="btn-light w-100 m-4" data-bs-dismiss="modal" >Cancel</x-button>
</x-modal>
