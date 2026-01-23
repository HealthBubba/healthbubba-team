<x-dashboard-layout title="{{$user->name}}" heading="{{$user->name}} - {{$user->code}}" >
    <div class="card">
        <div class="card-body">
            <div class="mb-10 d-md-flex justify-content-between">
                <div>
                    <div>
                        <h3 class="mb-0">{{$user->first_name}} {{ $user->last_name }} </h3>
                        <p class="text-muted">{{$user->email}}</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <div>
                            <h4 class="mb-0">{{$user->referral_code}}</h4>
                        </div>
                        <div>
                            <x-copy value="{{$user->referral_code}}" />
                        </div>
                    </div>
                </div>

                <div  >
                    {{-- <x-button data-bs-toggle="modal" data-bs-target="#add-referral" class="btn-primary btn-sm btn-outline-primary" >Add Referral</x-button> --}}
                    {{-- <x-button data-bs-target="#user-edit-{{$user->id}}" data-bs-toggle="modal" class="btn-sm btn-light-primary">
                        Edit Profile
                    </x-button> --}}
                    
                    {{-- <x-swal href="{{route('users.destroy', ['user' => $user->id])}}" class="btn btn-sm btn-light-danger">
                        Delete Account
                    </x-swal> --}}
                </div>

                {{-- <livewire:add-referral-modal :user="$user" /> --}}
                <livewire:user.edit modal="user-edit-{{$user->id}}" :user="$user" />
            </div>

            <div class="mb-10">
                <div class="row row-cols-md-4 g-5 row-cols-2">
                    <div>
                        <div class="card card-bordered">
                            <div class="card-body p-4">
                                <h1 >{{$referrals_count}}</h1>
                                <p class="text-muted mb-0">Total Referrals</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card card-bordered">
                            <div class="card-body  p-4">
                                <h1 >{{$doctors}}</h1>
                                <p class="text-muted mb-0">Doctors</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card card-bordered">
                            <div class="card-body  p-4">
                                <h1 >{{$patients}}</h1>
                                <p class="text-muted mb-0">Patients</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card card-bordered">
                            <div class="card-body  p-4">
                                <h1 ><x-currency/>{{number_format($user->commission)}}</h1>
                                <p class="text-muted mb-0">Earned Commission</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                {{-- <x-table >
                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                        <tr>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Type</th>
                            <th>Joined At</th>
                        </tr>
                    </thead>
    
                    <tbody class="text-gray-600 fs-6 fw-semibold">
                        @forelse ($referrals as $referral)
                            <tr>
                                <td>
                                    <a href="#">{{$referral->first_name}} {{$referral->last_name}} </a>
                                </td>
                                <td>{{$referral->email}}</a>
                                </td>
                                <td>{{$referral->type}}</td>
                                <td>{{$referral->created_at->toDayDateTimeString()}}</td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </x-table> --}}

                {{-- {{$referrals->links()}} --}}
                <div>
                    <div class="table-responsive">
                        @include('partials.tables.referrals')
                    </div>

                    {{$referrals->links()}}
                </div>
            </div>

            <livewire:user.edit modal="user-edit" />
        </div>
    </div>
</x-dashboard-layout>