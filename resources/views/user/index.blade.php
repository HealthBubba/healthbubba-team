<x-dashboard-layout title="Team Members" heading="Team Members" >
    <div class="card">
        <div class="card-body">
            <div class="d-md-flex justify-content-between">
                <div class="mb-5 mb-md-0">
                    <x-input.group wire:model.live.debounce.300ms="keyword" class="w-200px" placeholder="Search Team Members">
                        <x-slot:left>
                            <i class="ki-outline ki-magnifier fs-1"></i>
                        </x-slot:left>
                    </x-input.group>    
                </div>
                <div >
                    <x-button class="btn-primary" data-bs-toggle="modal" data-bs-target="#user-edit" >Add Team Member</x-button>
                </div>
            </div>

            @include('partials.tables.users')

            {{$users->links()}}

            <livewire:user.edit modal="user-edit" />
        </div>
    </div>
</x-dashboard-layout>