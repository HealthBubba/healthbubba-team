<x-dashboard-layout title="Referrals" heading="Referrals" >
    <div class="mb-10">
        <div class="row row-cols-md-4 g-5 row-cols-2">
            <div>
                <div class="card card-bordered">
                    <div class="card-body p-4">
                        <h1 >{{$referrals->count()}}</h1>
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
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div>
                <x-table >
                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                        <tr>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Referred By</th>
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
                                <td>{{$referral->email}}</td>
                                <td>
                                    @php
                                        $user = App\Models\User::whereCode($referral->referral_code)->first();
                                    @endphp
                                    <a href="{{route('team.show', ['user' => $user->id])}}">
                                        {{$user->name}}
                                    </a>
                                </td>
                                <td>{{$referral->type}}</td>
                                <td>{{$referral->created_at->toDayDateTimeString()}}</td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </x-table>

                {{$referrals->links()}}
            </div>

            <livewire:user.edit modal="user-edit" />
        </div>
    </div>
</x-dashboard-layout>