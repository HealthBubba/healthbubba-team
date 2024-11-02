<x-table >
    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
        <tr>
            <th class="min-w-200px">Name</th>
            <th class="min-w-200px">Email Address</th>
            @if ($authenticated->is_admin)                            
                <th>Referred By</th>
            @endif
            <th>Type</th>
            <th class="min-w-150px">Joined At</th>
        </tr>
    </thead>

    <tbody class="text-gray-600 fs-6 fw-semibold">
        @forelse ($referrals as $referral)
            <tr>
                <td>
                    <a href="#">{{$referral->first_name}} {{$referral->last_name}} </a>
                </td>
                <td>{{$referral->email}}</td>
                @if ($authenticated->is_admin)
                    <td>
                        @php
                            $user = App\Models\User::whereCode($referral->referral_code)->first();
                        @endphp
                        <a href="{{route('team.show', ['user' => $user->id])}}">
                            {{$user->name}}
                        </a>
                    </td>
                @endif
                <td>{{$referral->type}}</td>
                <td>{{$referral->created_at->toDayDateTimeString()}}</td>
            </tr>
        @empty
        @endforelse
    </tbody>
</x-table>