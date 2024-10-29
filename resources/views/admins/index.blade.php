<x-dashboard-layout title="Administrators" heading="Administrators" >
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
                <div >
                    <x-button class="btn-primary" data-bs-toggle="modal" data-bs-target="#user-edit" >Add Admin</x-button>
                </div>
            </div>

            <div>
                <x-table >
                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                        <tr>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Role</th>
                            <th>Joined At</th>
                            <th></th>
                        </tr>
                    </thead>
    
                    <tbody class="text-gray-600 fs-6 fw-semibold">
                        @forelse ($admins as $admin)
                            <tr>
                                <td>
                                    {{$admin->name}}</a>
                                </td>
                                <td>{{$admin->email}} </td>
                                <td>{{$admin->role->label()}} </td>
                                <td>{{$admin->created_at->toDayDateTimeString()}}</td>
                                <td>
                                    <x-button data-bs-target="#user-edit-{{$admin->id}}" data-bs-toggle="modal" class="btn-sm btn-icon btn-light w-30px h-30px">
                                        <i class="text-muted ki-outline ki-message-edit fs-2"></i>
                                    </x-button>

                                    <x-swal href="{{route('users.destroy', ['user' => $admin->id])}}" class="btn btn-sm btn-icon btn-light-danger w-30px h-30px">
                                        <i class="ki-outline ki-trash fs-2"></i>
                                    </x-swal>

                                    <livewire:admins.edit modal="user-edit-{{$admin->id}}" :user="$admin" />
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </x-table>

                {{$admins->links()}}

                <livewire:admins.edit modal="user-edit" />
            </div>
        </div>
    </div>
</x-dashboard-layout>