<div class="table-responsive">
    <x-table >
        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
            <tr>
                <th class="min-w-200px">Name</th>
                @if ($authenticated->is_admin)                            
                    <th>Referred By</th>
                @endif
                <th class="min-w-100px">Verification</th>
                <th>Type</th>
                <th>Status</th>
                <th class="min-w-150px">Activated At</th>
                <th class="min-w-200px">Referred At</th>
            </tr>
        </thead>
    
        <tbody class="text-gray-600 fs-6">
            @forelse ($referrals as $referral)
                <tr>
                    <td>
                        <p class="text-primary mb-0">{{$referral->first_name}} {{$referral->last_name}} </p>
                        <p class="mb-0 text-sm">{{$referral->email}}</p>
                    </td>
                    @if ($authenticated->is_admin)
                        <td>
    
                            <a href="{{route('team.show', ['user' => $referral->referral_code])}}">
                                {{$referral->referrer->email}} - {{ $referral->referral_code }}
                            </a>
                            {{$referral->referrer->first_name}} {{$referral->referrer->last_name}}
                        </td>
                    @endif
                    <td class="fs-6">
                        <p class="mb-0" ><span class="fw-bold">Email:</span> {{ $referral->email_verified ? 'Yes' : 'No'}}</p>
                        <p class="mb-0"><span class="fw-bold">Phone:</span> {{ $referral->phone_verified ? 'Yes' : 'No'}}</p>
                    </td>
                    <td>{{$referral->type}}</td>
                    <td>{{$referral->referral->status}}</td>
                    <td>{{$referral->referral->activated_at}}</td>
                    <td>{{$referral->referral->created_at->toDayDateTimeString()}}</td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </x-table>
</div>