<x-modal id="{{$modal}}" data-dismiss >
    <form wire:submit="save">
        <div class="row g-5">
            <div class="col-md-6" >
                <x-input.label>First Name</x-input.label>
                <x-input wire:model="firstname" placeholder="First Name" />
                <x-input.error key="firstname" />
            </div>

            <div class="col-md-6" >
                <x-input.label>Last Name</x-input.label>
                <x-input wire:model="lastname" placeholder="Last Name" />
                <x-input.error key="lastname" />
            </div>

            <div class="col-md-12" >
                <x-input.label>Email Address</x-input.label>
                <x-input type="email" wire:model="email" placeholder="Email Address" />
                <x-input.error key="email" />
            </div>

            <div class="col-md-12" >
                <x-input.label>Phone Number</x-input.label>
                <x-input wire:model="phone" placeholder="Phone Number" />
                <x-input.error key="phone" />
            </div>

            <div class="col-md-12" >
                <div class="d-flex align-items-center justify-content-between">
                    <x-input.label>Referral Code</x-input.label>
                    {{-- <x-button class="btn-link fw-medium btn-sm py-0" type="button" wire:click="generate" wire:loading wire:target="generate" color="primary" >{{$user ? 'Refresh Code' : 'Generate Code'}}</x-button> --}}
                </div>
                <x-input wire:model="code" placeholder="Referral Code" style="user-select: all;" />
                <x-input.error key="code" />
            </div>


            <div class="col-md-12">
                <x-input.label>Password</x-input.label>
                <x-input.password wire:model="password" placeholder="Password" />
                <x-input.error key="password" />
            </div>

            <div class="col-md-12">
                <x-button wire:loading wire:target="save" class="btn-primary w-100" >Save</x-button>
            </div>
        </div>
    </form>
</x-modal>
