<div>
    @if ($authenticated->is_marketer)
        <x-modal id="add-referral" data-dismiss >
            <form wire:submit="add">
                <div class="mb-5">
                    <h5>Add your referred user's email address</h5>
                    <p class="text-muted">Provide the email address below of your referred users to add them to your referrals.</p>
                </div>
                <div class="mb-5">
                    <x-input.label>User Email Address</x-input.label>
                    <x-input wire:model="email" placeholder="Email Address" />
                    <x-input.error key="email" />
                </div>

                <div class="col-md-12">
                    <x-button wire:loading wire:target="add" class="btn-primary w-100" >Add Referral</x-button>
                </div>
            </form>
        </x-modal>    
    @endif
</div>