<div class="table-responsive">
    <x-table id="{{$id ?? '#datatable'}}" >
        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
            <tr>
                <th>Name</th>
                <th>Email Address</th>
                <th>Referral Code</th>
                <th>Referrals</th>
                <th>Total Commission</th>
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
                    <td>{{$user->email}}</td>
                    <td>{{$user->code}} <x-copy :value="$user->code" /> </td>
                    <td>{{$user->referrals_count}}</td>
                    <td><x-currency/>{{number_format($user->commission)}}</td>
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
</div>