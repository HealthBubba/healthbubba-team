<x-dashboard-layout title="Team Members" heading="Team Members" >
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
                    <x-button class="btn-primary" data-bs-toggle="modal" data-bs-target="#user-edit" >Add Team Member</x-button>
                </div>
            </div>

            <div>
                <x-table >
                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                        <tr>
                            <th>Name</th>
                            <th>Referral Code</th>
                            <th>Sign ups</th>
                            <th>Joined At</th>
                            <th></th>
                        </tr>
                    </thead>
    
                    <tbody class="text-gray-600 fs-6 fw-semibold">
                        @forelse ($users as $user)
                            <tr>
                                <td>
                                    <a href="{{route('team.show', ['user' => $user->id])}}">{{$user->name}}</a>
                                </td>
                                <td>{{$user->code}} <x-copy :value="$user->code" /> </td>
                                <td>{{$user->referrals_count}}</td>
                                <td>{{$user->created_at->toDayDateTimeString()}}</td>
                                <td>
                                    <a href="{{route('team.show', ['user' => $user->id])}}" class="btn btn-sm btn-icon btn-light w-30px h-30px">
                                        <i class="text-muted ki-outline ki-eye fs-2"></i>
                                    </a>

                                    <x-button data-bs-target="#user-edit-{{$user->id}}" data-bs-toggle="modal" class="btn-sm btn-icon btn-light w-30px h-30px">
                                        <i class="text-muted ki-outline ki-message-edit fs-2"></i>
                                    </x-button>

                                    <x-swal href="{{route('users.destroy', ['user' => $user->id])}}" class="btn btn-sm btn-icon btn-light-danger w-30px h-30px">
                                        <i class="ki-outline ki-trash fs-2"></i>
                                    </x-swal>

                                    <livewire:user.edit modal="user-edit-{{$user->id}}" :user="$user" />
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </x-table>

                {{$users->links()}}
            </div>

            <livewire:user.edit modal="user-edit" />
        </div>
    </div>
</x-dashboard-layout>