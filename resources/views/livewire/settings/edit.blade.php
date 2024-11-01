<div class="col-md-5">
    <form wire:submit="update">
        <div class="mb-5">
            <x-input.label>Commission (₦)</x-input.label>
            <x-input wire:model="commission" />
            <x-input.error key="commission" />
        </div>

        <div>
            <x-button wire:target="update" wire:loading class="btn btn-primary">Update</x-button>
        </div>
    </form>

</div>
