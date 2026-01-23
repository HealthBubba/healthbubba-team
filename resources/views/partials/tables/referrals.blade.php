<x-table >
    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
        <tr>
            <th class="min-w-200px">Name</th>
            <th class="min-w-200px">Email Verified</th>
            @if ($authenticated->is_admin)                            
                <th>Referred By</th>
            @endif
            <th>Type</th>
            <th>Status</th>
            <th>Activated At</th>
            <th class="min-w-150px">Referred At</th>
        </tr>
    </thead>

    <tbody class="text-gray-600 fs-6 fw-semibold">
        @forelse ($referrals as $referral)
            <tr>
                <td>
                    <p class="text-primary mb-0">{{$referral->first_name}} {{$referral->last_name}} </p>
                    <p class="mb-0 text-sm">{{$referral->email}}</p>
                </td>
                <td>
                    <i class="ki-outline fs-1 {{ $referral->email_verified ? 'ki-check text-success' : 'ki-cross text-danger'}}"></i>
                </td>
                @if ($authenticated->is_admin)
                    <td>

                        <a href="{{route('team.show', ['user' => $referral->referral_code])}}">
                            {{$referral->referrer->email}}
                        </a>
                        {{$referral->referrer->first_name}} {{$referral->referrer->last_name}}
                    </td>
                @endif
                <td>{{$referral->type}}</td>
                <td>{{$referral->referral->status}}</td>
                <td>{{$referral->referral->activated_at}}</td>
                <td>{{$referral->referral->created_at->toDayDateTimeString()}}</td>
            </tr>
        @empty
        @endforelse
    </tbody>
</x-table>