<x-dashboard-layout title="Referrals" heading="Referrals" >
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
            {{-- @if ($authenticated->is_marketer)
                <div>
                    <div class="card card-bordered">
                        <div class="card-body  p-4">
                            <h1 ><x-currency/>{{number_format($authenticated->commission)}}</h1>
                            <p class="text-muted mb-0">Earned Commission</p>
                        </div>
                    </div>
                </div>
            @endif --}}
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-title">Referrals</div>
            <div class="card-toolbar">
                @if ($authenticated->is_marketer)
                    <x-button data-bs-toggle="modal" data-bs-target="#add-referral" class="btn-primary btn-sm btn-outline-primary" >Add Referral</x-button>
                    <livewire:add-referral-modal :user="$authenticated" />
                @endif
            </div>
        </div>
        <div class="card-body">
            <div>
                <div class="table-responsive">
                    @include('partials.tables.referrals')
                </div>

                {{$referrals->links()}}
            </div>

            <livewire:user.edit modal="user-edit" />
        </div>

    </div>
</x-dashboard-layout>