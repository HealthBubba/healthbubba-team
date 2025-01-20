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
                        <div>
                            <!--begin::Toggle-->
                            <button type="button" class="btn btn-light btn-icon btn-sm rotate" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-offset="10px, 10px">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10px h-10px">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                  </svg>                                  
                            </button>

                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-auto min-w-200 mw-300px" data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a href="{{route('team.show', ['user' => $user->id])}}" class="menu-link px-3">
                                        View
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="{{route('impersonate', ['id' => $user->id])}}" class="menu-link px-3">
                                        Impersonate
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" data-bs-target="#user-edit-{{$user->id}}" data-bs-toggle="modal" class="menu-link px-3">
                                        Edit
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <x-swal href="{{route('users.destroy', ['user' => $user->id])}}" class="menu-link px-3">
                                        Delete
                                    </x-swal>
                                </div>
                            </div>
                        </div>

                        <livewire:user.edit modal="user-edit-{{$user->id}}" :user="$user" />
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </x-table>
</div>