<x-dashboard-layout title="Team Members" heading="{{$user->name}}" >
    <div class="card">
        <div class="card-body">
            <div class="d-md-flex justify-content-between">
                <div class="mb-5 mb-md-0">
                    <x-input.group wire:model.live.debounce.300ms="keyword" class="w-200px" placeholder="Search Zones">
                        <x-slot:left>
                            <i class="ki-outline ki-magnifier fs-1"></i>
                        </x-slot:left>
                    </x-input.group>    
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>